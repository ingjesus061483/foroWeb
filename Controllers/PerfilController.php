<?php

class PerfilController 
{
    private PerfilRepository $perfilRepository; 
    private PermisoRepository $PermisoRepository;
    private ModuloRepository $ModuloRepository;
    public function __construct()
    {
        $this->perfilRepository=new perfilRepository();
        $this->PermisoRepository=new PermisoRepository();   
        $this->ModuloRepository=new ModuloRepository();
    }	
    private function Getperfil($result)
    {
        $perfil=null;
        while($row=$result->fetch()){
           $perfil=new Perfil();
           $perfil->id=$row->id;
           $perfil->nombre=$row->nombre;
           $perfil->descripcion=$row->descripcion; 
           $perfil->Permisos=$this->PermisoRepository->getPermisosByPerfil($row->id);
        }
        return $perfil;
    }
	public function index()
	{     
        $result=$this->perfilRepository->GetAll();        
        return $result;			
    }
    public function detalleGet($id,&$combo)
    {
        $resultperfil=$this->perfilRepository->Find($id);
        $perfil=$this->Getperfil($resultperfil);
        $resultmodulos=$this->ModuloRepository->GetAll();
        $combo=$resultmodulos;
        return $perfil;
    }
    public function editar($id){
        $result=$this->perfilRepository->find($id);
        $perfil=$this->Getperfil($result);
        return $perfil;
    }
    public function delete($id,&$msg)
    {        
        $this->perfilRepository-> delete($id);        
        $msg="El registro se ha eliminado correctamente";        
    }
    public function CrearPost($request,&$msg)
    {        
        $this->perfilRepository->Store($request);        
        $msg="Registro insertado con exito ";
       
    }
    public function update($request,&$msg)
    {       
        $this->perfilRepository->update($request->id, $request);        
        $msg="Registro actualizado con exito ";
        
    }
}
?>