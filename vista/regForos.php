<?php
require("../classes/clforos.php");
$id=$_POST["idadministrador"];
$message=$_POST["mensaje"];
$titulo=$_POST["titulo"];
$fecha=date_create($_POST["fecha"]);
$date = date_format($fecha,"Y-m-d");
echo $id." ".$message." ".$titulo." ".$date ; 
$foro=new clforos();
$msg="";
$foro->inicializar($msg);
$foro-> paAgregarForo($id,$titulo,$message,$date);
?>