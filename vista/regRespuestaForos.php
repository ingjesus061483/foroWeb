<?php
require_once("../classes/clforos.php");
$idforo=$_POST["idforo"];
$idtipoid=$_POST["idtipoid"];
$idusuario=$_POST["idusuario"];
$message=$_POST["mensaje"];
$fecha=date_create($_POST["fecha"]);
$date = date_format($fecha,"Y-m-d");
echo "foro:  ". $idforo." mensaje: ".$message." tipoid ".$idtipoid." fecha ".$date ." usuario ".$idusuario ; 
$foro=new clforos();
switch($idtipoid)
{
	case 1:
	{ 
	$idadministrador=$idusuario;
	$idprofesor=0;
	$idalumno=0;
	break;
	}
	case 2:{
	$idadministrador=0;
	$idprofesor=$idusuario;
	$idalumno=0;
	break;
	}
	case 3:{
	$idadministrador=0;
	$idprofesor=0;
	$idalumno=$idusuario;
	break;
	}
}
$msg="";
$foro->inicializar($msg);
$foro->paAgregarRespuesta($idforo,$idadministrador,$idprofesor,$idalumno,$date,$message);
?>