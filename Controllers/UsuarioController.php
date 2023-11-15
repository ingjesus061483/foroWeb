<?php
/*require_once('../Repositories/UsuarioRepository.php');
require_once('../Repositories/PerfilRepository.php');*/
class UsuarioController
{
    private UsuarioRepository $usuarioRepository; 
    private PerfilRepository $perfilRepository;     
    private CursoRepository $cursoRepository;
    public function __construct()
    {

        $this->usuarioRepository=new UsuarioRepository();
        $this->perfilRepository=new PerfilRepository();
        $this->cursoRepository=new CursoRepository();
    }	 
    function DeleteCursosByUsuarios($request)
    {
        $msg="";        
        $this->usuarioRepository->DeleteCursosByUsuarios($request);		        
        $msg="Registro eliminado con exito ";
    	return $msg;

    }       
    function GetUser($row) 
    {
        $usuario=null;     
        while ($fila=$row->fetch())
        {
            $usuario=new Usuario();
            $usuario->id=$fila->id;
            $usuario->identificacion=$fila->identificacion;
            $usuario->nombre=$fila->nombre;
            $usuario->apellido=$fila->apellido;
            $usuario->direccion=$fila->direccion;
            $usuario->telefono=$fila->telefono;
            $usuario->email=$fila->email;
            $usuario->usuario=$fila->usuario;
            $usuario->perfil_id=$fila->perfil_id;
        }
        if($usuario!=null)
        {
            $row=$this->perfilRepository->find($usuario->perfil_id);
            $perfil=null;
            while ($fila=$row->fetch())
            {
                $perfil=new Perfil();
                $perfil->id=$fila->id;
                $perfil->nombre=$fila->nombre;
                $perfil->descripcion=$fila->descripcion;
            }
            $usuario->Perfil=$perfil;            
            $usuario->Cursos= $this->usuarioRepository->GetCursosByUsuarios($usuario->id);
        }        

        return $usuario;        
    }
	public function index(&$cursos)
	{     
        $cursos=$this->cursoRepository->GetAll();
        $result=$this->usuarioRepository->GetAll();        
        return $result;			
	}
    public function Show($id,&$curso)
    {
        $row=$this->usuarioRepository->find($id);  
        $usuario=$this-> GetUser($row); 
        $curso=$this->cursoRepository->GetAll();

        return $usuario;        
    }
    public function Edit($id, &$combo)
    {    
        $combo= $this->perfilRepository->GetAll();        
        $row=$this->usuarioRepository->find($id);  
        $usuario=$this-> GetUser($row);   
        return $usuario;
    }
    public function update($id,$request,&$combo)
    {
        $combo= $combo= $this->perfilRepository->GetAll();
        $row=$this->usuarioRepository->find($id);  
        $usuario=$this-> GetUser($row);                   
        $msg="";
		if($usuario!=NULL)
		{
			$this->usuarioRepository->update($id, $request );		
			$msg="Registro editado con exito ";
     	}        
        else
        {
            $msg="El usuario no existe";            
        }
        return $msg;

    }
    public function Create(&$combo)
    {    
        $combo=$this->perfilRepository->GetAll();
    }
    public function store($request)
	{  
     
        $msg="";        
        $this->usuarioRepository->store($request);		        
        $msg="Registro insertado con exito ";
    	return $msg;
	}
    Public function PasswordChange($request )    
    {
        $usuario=$this->Login($request);       
        if($usuario!=null)
		{
            $this->usuarioRepository->PasswordChange($usuario->id,$request);
        }        
    }
	Public function Login($request )
	{       
        $result=$this->usuarioRepository->login($request);        
        $usuario=$this->GetUser($result);
        return $usuario;    
    }
    public function delete($id)    
    {        
        $usuariosesion=isset($_SESSION["usuario"])? unserialize($_SESSION["usuario"]):null;    
        $idsesion=$usuariosesion!=null? $usuariosesion->id:0;     
        if($id!=$idsesion)        
        {            
            $this->usuarioRepository->delete($id);            
            $data=[
                "msg" =>"Registro eliminado con exito",            
                "error"=>false
            ];
        }        
        else        
        {            
            $data=[
                "msg" =>"El usuario que intenta elimar tiene la sesion abierta",
                "error"=>true
            ];
        }            
        return $data;
       
    }
    
	
	
	
}
