<?php
require("../classes/clforos.php");
$id=$_POST["idadministrador"];
$msg=$_POST["mensaje"];
$titulo=$_POST["titulo"];
$fecha=$_POST["fecha"];
$date = date_format($_POST["fecha"],"yyyy-MM-dd");
echo $id." ".$msg." ".$titulo." ".$fecha ; 
//$foro=new foro();
?>