<?php
require_once("../../Repositories/PermisoRepository.php");
$request=(object)$_POST;
$metodo=$request->metodo;
$permisorepository=new PermisoRepository();
$msg="";
$success =false;
switch($metodo)
{
    case "agregarPermiso":
    {      
        if(!$permisorepository->buscarpermiso($idperfil,$modulo,$value))
        {
            $success=true;
            $permisorepository->Store($request);
            $msg="El registro ha sido insertado correctamete";
        }
        else
        {
            $msg ="El registro ya se encuentra registrado";
        }     
        break;
    }
    case "EliminarPermiso":
    {
        $id=$request->id;
        $permisorepository->delete($id);
        $msg="El permiso ha sido eliminado";
        $success =true;
        break;
    }
}
echo json_encode(array("success"=>$success,"mesage"=>$msg));
