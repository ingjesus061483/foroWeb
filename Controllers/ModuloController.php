<?php
class ModuloController
{
    private ModuloRepository $moduloRepository; 
    public function __construct()
    {
        $this->moduloRepository=new ModuloRepository();
    }	
    private function Getmodulo($result)
    {
        $modulo=null;
        while($row=$result->fetch()){
           $modulo=new Modulo();
           $modulo->id=$row->id;
           $modulo->nombre=$row->nombre;
           $modulo->descripcion=$row->descripcion;           
        }
        return $modulo;
    }

    public function Index()
    {  
        $result=$this->moduloRepository->GetAll();              
        return $result;
    }
    public function store($request,&$msg)
    {
        $msg="";        
        $this->moduloRepository-> store($request);        
        $msg="Registro insertado con exito ";
    }
    public function editar($id){
        $result=$this->moduloRepository->find($id);     
        $modulo=$this->Getmodulo($result);    
        return $modulo;
    }
    public function update($request,&$msg)
    {       
        $this->moduloRepository->update($request->id, $request);        
        $msg="Registro actualizado con exito ";
        
    }
    public function delete($id,&$msg)
    {        
        $this->moduloRepository-> delete($id);        
        $msg="El registro se ha eliminado correctamente";        
    }
}


