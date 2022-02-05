<?php
require_once("../../data/DataAccess.php");
$metodo=$_POST["metodo"];
$data=new DataAccess();
$msg="";
$success =false;
switch($metodo)
{
    case "agregarPermiso":
    {
        $idperfil=$_POST["idperfil"];
        $modulo=$_POST["modulo"];
        $value=$_POST["value"];        
        if(! $data->buscarpermiso($idperfil,$modulo,$value))
        {
            $success=true;
            $data->insertarpermiso($idperfil,$modulo,$value);
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
        $id=$_POST["id"];
        $data->EliminarPermiso($id);
        $msg="El permiso ha sido eliminado";
        $success =true;
        break;
    }
}
echo json_encode(array("success"=>$success,"mesage"=>$msg));
?>