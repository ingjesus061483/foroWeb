<?php
class UsuariosController
{
    private $data; 
    public function __construct()
    {
        $this->data=new DataAccess();
    }	
	public function index()
	{     
        $result=$this->data->MostrarUusuarios();
       $table= Utilidades::Creartabla($result,"ver");        
        return $table;			
	}
    public function DetalleGet($id)
    {
        $usuario=$this->data->BuscarUsuarios($id);
        if($usuario!=NULL)
        {
            $usuario->Perfil=$this->data->buscarPerfil($usuario->idperfil);  
        }
        return $usuario;        
    }
    public function EliminarPost($id,&$msg,&$error)    
    {
        $usuario=$this->data->BuscarUsuarios($id);
        $msg="";
        if($usuario!=NULL)
		{
            $usuariosesion=unserialize($_SESSION["usuario"]);
            if($id!=$usuariosesion->id)
            {
                $this->data->EliminarUsuarios($id);
                $msg ="Registro eliminado con exito";
            }
            else
            {
                $error ="El usuario que intenta elimar tiene la sesion abierta"; 
            }            
        }
        else{            
            $error ="El usuario no existe";
        }
    }
    public function EditarGet($id,&$usuario, &$combo)
    {    
        $result= $this->data->llenarCombo("perfil");
        $combo=Utilidades::vector($result);
        $usuario=$this->data->BuscarUsuarios($id);
    }
    public function EditarPost ($id, $identificacion, $prinombre ,$segnombre,$priapellido,$segapellido,
    $Direccion,$telefono,$idperfil,&$combo)
    {
        $result= $this->data->llenarCombo("perfil");
        $combo=Utilidades::vector($result);
        $usuario=$this->data-> BuscarUsuarios($id);
        $msg="";
		if($usuario!=NULL)
		{
			$this->data->EditarUsuarios($id, $identificacion, $prinombre ,$segnombre,$priapellido,$segapellido,
            $Direccion,$telefono,$idperfil );
		
			$msg="Registro editado con exito ";
     	}
         else
         {
             $msg="El usuario no existe";            
         }
         return $msg;

    }
    public function CrearGet(&$combo)
    {    
        $result=$this->data->llenarCombo("perfil");
        $combo=Utilidades::vector($result);
       
    }
    public function CrearPost ($identificacion, $prinombre ,$segnombre,$priapellido,$segapellido, 
	                           $Direccion, $telefono,$Email,$Usuario,$pwd,$idperfil)
	{
        $id=0;       
      
        $usuario=$this->data-> BuscarUsuarios($id);
        $msg="";
		if($usuario==NULL)
		{
			$this->data->InsertarUsuarios($identificacion, $prinombre ,$segnombre,$priapellido,$segapellido, 
            $Direccion, $telefono,$Email,$Usuario, md5($pwd),$idperfil);		
			$msg="Registro insertado con exito ";
     	}
         else
         {
             $msg="El usuario ya existe";            
         }
         return $msg;
		
	}
    Public function PasswordChange($user,$oldPwd,$newpwd,&$msg )    
    {
        $id=$this->data->login($user,md5($oldPwd));
        if($id==0)
		{
            $msg="Usuario o contraseña invalido";           
		}
        else
        {
            $this->data->PasswordChange($id,md5($newpwd));
        }
        return $id ;
    }
	Public function Login($user,$pwd,&$msg )
	{       
        $id=$this->data->login($user,md5($pwd));
		if($id==0)
		{
            $msg="Usuario o contraseña invalido";
           
		}
		else
		{
            $usuario=$this-> data-> BuscarUsuarios($id);
            $usuario->Perfil=$this-> data->buscarPerfil($usuario->idperfil);
            if( $usuario->Perfil->estado==1)
            {
                $perfil = $usuario->Perfil;
                $perfil->Permisos=$this->data-> mostroarPermisosPerfil($perfil->id);
                $usuario->Perfil=$perfil;
                $_SESSION["usuario"]=serialize($usuario) ;                
            }
            else
            {
                $msg="Este usuario tiene el perfil inactivo";
            }            
		}		
	}
	
	
}
?> 