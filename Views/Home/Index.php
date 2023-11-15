<?php
$titulo="Home";
require_once("../../shared/head.php");
$HomeController=new HomeController();
$usuario=$HomeController->index();
$perfil=$usuario->Perfil;
?>

<?php require_once("../../shared/foot.php");?>
