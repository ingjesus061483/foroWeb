<?php
require_once("../../Repositories/PermisoRepository.php");
$request=(object)$_POST;
$opcion=$request->opcion;
$permisorepository=new PermisoRepository();
$msg="";
$success =false;
switch($opcion)
{
    case 1:
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
    case 2:
    {
        $id=$request->id;
        $permisorepository->delete($id);
        $msg="El permiso ha sido eliminado";
        $success =true;
        break;
    }
}
echo json_encode(array("success"=>$success,"mesage"=>$msg));
