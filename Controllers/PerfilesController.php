<?php
class PerfilesController 
{
    private $data; 
    public function __construct()
    {
        $this->data=new DataAccess();
    }	
	public function index()
	{     
        $result=$this->data->MostrarPerfiles();
        $table= Utilidades::Creartabla($result,"ver");        
        return $table;			
    }
    public function detalleGet($id,&$table,&$combo)
    {
        $perfil=$this->data->BuscarPerfil($id);
        $result=$this->data->llenarCombo("modulos");
        $combo=Utilidades::vector($result);
        $tanle="";
        if($perfil!=NULL)
        {
            $perfil->Permisos=$this->data->mostroarPermisosPerfil($id);
            $table= Utilidades::Creartabla($perfil->Permisos,"eliminar");
        }
        return $perfil;
    }
    public function eliminarPost($id,&$msg,&$error)
    {
        $perfil=$this->data->BuscarPerfil($id);
        if($perfil !=NULL)
        {
           $this->data-> eliminarPerfil($id);
            $msg="El registro se ha eliminado correctamente";
        }
        else
        {
            $error ="El perfil no existe";
        }
    }
    public function CrearPost($nombre,$descripcion,&$msg,&$error)
    {
        $perfil=$this->data-> BuscarPerfilNombre($nombre);
        $msg="";
        if($perfil==NULL)
        {
          $this->data-> InsertarPerfiles($nombre,$descripcion);
          $msg="Registro insertado con exito ";
        }
        else
        {
            $msg="El perfil ya existe";
        }
    }
}
?>