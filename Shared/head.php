<?php 
session_start();
require_once("../../Model/Usuario.php");
require_once("../../Model/Perfil.php");
require_once("../../Model/Modulo.php");
require_once("../../Model/Curso.php");
require_once('../../Repositories/UsuarioRepository.php');
require_once('../../Repositories/PerfilRepository.php');
require_once('../../Repositories/PermisoRepository.php');
require_once('../../Repositories/ModuloRepository.php');
require_once('../../Repositories/CursoRepository.php');
require_once("../../Controllers/ModuloController.php");
require_once("../../Controllers/CursoController.php");
require_once("../../Controllers/HomeController.php");
require_once("../../Controllers/PerfilController.php");
require_once("../../Controllers/UsuarioController.php");
$modulo="inicio";
$url="/foroweb/";
if (!isset($_SESSION["usuario"]))
{
	header('Location:../../login.php');
}
if(isset($_POST["cerrar"]))
{
	unset($_SESSION['usuario']);	
	header('Location:../../login.php');
}
$usuario=unserialize($_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ForoWeb - <?=$titulo?></title>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../alertifyjs/css/alertify.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">	</script>
    <script type="text/javascript" src="../../alertifyjs/alertify.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?=$url?>Views/Home">
					Foro web
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?=$url?>Views/Home">Home</a></li>
				<li><a href="<?=$url?>views/usuarios/">Usuarios</a></li>
				<li><a href="<?=$url?>views/perfiles/">Perfiles</a></li>
				<li><a href="<?=$url?>views/modulos/">Modulos</a></li>
				<li><a href="<?=$url?>views/cursos/">Cursos</a></li>
                <li>
                    <?php if($usuario!=null){?>
                    <form action="index.php"onsubmit="return validar('Desea salir de esta aplicacion?')" " method="post">     
						<br>                
                        <input type="submit" name="cerrar" type="submit" value="Cerrar sesion"/>
                    </form>            	
                    <?php }?>
				</li>
			</ul>
		</div>
	</nav>
    <input type="hidden"  id="msg" value="<?=$msg?>"/>
    <div class='container'>
		<strong>Usuario conectado:</sotron><a id="husuario" href="#">	<?=$usuario->usuario?> > <?=$usuario->Perfil->nombre?></a>
		<h1 class="mt-4"><?=$titulo?></h1>