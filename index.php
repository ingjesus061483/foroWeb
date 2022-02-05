<?php
session_start();
require_once("Model/Usuarios.php");
require_once("Model/Perfil.php");
require_once("Data/DataAccess.php");
require_once("Controllers/UsuariosController.php");
$data=new DataAccess();
$id=0;
if(isset($_POST["enviar"]))
{
  unset($_SESSION['usuario']);
}
if (!isset($_SESSION['usuario']))
{
  header('Location:login.php');
}
$usuario= unserialize($_SESSION['usuario']);
$perfil=$usuario->Perfil;
//$usuario=$data->BuscarUsuarios($id);
//if($usuario!=Null)
//{
  //$usuario->Perfil=$data->BuscarPerfil($usuario->idperfil);
  //$perfil=$usuario->Perfil;
//}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>usuarios</title>
<!-- INICIO LIBRERIAS-->
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/usuarios.css">
	<link rel="stylesheet" href="javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<script type="text/javascript" src="javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
    <script language="JavaScript" type="text/javascript" src="codejscript/usuario.js"></script>
<!-- FIN LIBRERIAS-->
</head>
<body>
  <header>
     <nav>
       <ul>
       <li><a href="Index.php">Inicio</a></li>
      <li><a href="">Modulos</a></li>
      <li><a href="">Cursos</a></li>
      <li><a href="Views/Perfiles/Index.php">Roles y permisos</a></li>
      <li><a href="">Foro</a></li>
      <li><a href="Views/Usuarios/Index.php">Usuarios</a></li> </ul>
     </nav>
  </header>
  <div class='container'>
 <?php 
   if($usuario!=NULL)
   {   
    echo"
        <div style='float: right;' class='card'>
          <div class='header'>
            Usuario conectado
          </div>
          <form id='frm' onsubmit='return validar()' method='post' action='index.php' >
            <div class='body'>            
                <p><strong>indentificacion:</strong>  $usuario->identificacion </p>
                  <p><strong>Nombre completo:</strong>$usuario->prinombre $usuario->segnombre $usuario->priapellido 
                  $usuario->segapellido</p>
                  <p><strong>Direccion:</strong> $usuario->Direccion</p>
                  <p><strong>Telefono:</strong> $usuario->telefono</p>
                  <p><strong>Perfil:</strong> $perfil->nombre</p>          
            </div>
            <div class='footer'>
              <button  class='button' type='submit' name ='enviar' >Cerrar sesion</button>
              <a  class='button' href='views/usuarios/editar.php?id=$usuario->id' >Editar</a>   
              <a  class='button' href='editar.php?id=$usuario->id' >Cambiar contraseña</a>				
            </diV>
          </form>
        </div>";
   }
    ?>
  </div>
  <script type="text/javascript"> 	
     function validar()
     {
       alert("Hola");
        permitir=false;
        alertify.confirm("Desea salir del programa?",
        function()
        {
            permitir =true;                                   
        },
        function()
        {
            alertify.error('Cancel');
        });       
        return permitir;
     }	
  </script>
</body>
</html>

	

