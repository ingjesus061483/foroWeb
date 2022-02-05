<?php
class ModulosController
{
    private $data; 
    public function __construct()
    {
        $this->data=new DataAccess();
    }	
    public function Index()
    {  $result=$this->data->MostrarModulos();
        $table= Utilidades::Creartabla($result,"ver");        
        return $table;
    }
    public function CrearPost($nombre,$descripcion,&$msg,&$error)
    {
        $modulo=$this->data-> BuscarModulosNombre($nombre);
        $msg="";
        if($modulo==NULL)
        {
          $this->data-> insertarModulo($nombre, $descripcion);
          $msg="Registro insertado con exito ";
        }
        else
        {
            $error="El perfil ya existe";
        }
    }
}
?>