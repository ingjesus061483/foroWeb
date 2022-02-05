<?php
require("../classes/clusuarios.php");
$objusuario=new  clusuarios();
$msg="";
$objusuario->inicializar($msg);
echo "<p>".$msg."</p>";
$nom=$_POST["nom"];
$ape=$_POST["ape"];
$dir=$_POST["dir"];
$tel=$_POST["tel"];
$ciu=$_POST["ciu"];
$email=$_POST["email"];
$usu=$_POST["usu"];
$pwd=$_POST["pwd"];
$tipo=$_POST["tipo"];
$objusuario->nuevo($nom,$ape,$dir,
$ciu,$tel,$usu,$email,$pwd,"");
$objusuario->guardar($msg,$tipo);
echo "<p>".$msg." ahora puede <a href='../index.php'> iniciar sesion</a></p>";
?>