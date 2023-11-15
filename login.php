<?php
session_start();
$titulo="";
require_once("Model/Usuario.php");
require_once("Model/Perfil.php");
require_once('Repositories/UsuarioRepository.php');
require_once('Repositories/PerfilRepository.php');
require_once('Repositories/CursoRepository.php');
require_once("Controllers/UsuarioController.php");
$usuariocontroller=new UsuarioController();
$msg="";
if (isset($_POST["Ingresar"]))
{
    $request=(object)$_POST;    
    $usuario=$usuariocontroller->login($request);      
    if($usuario!=null)
    {
        $_SESSION["usuario"]=serialize($usuario) ;                
        header('Location:Views/Home/index.php');
    }
    $msg="Autenticacion ha fallado";   
}
if (isset($_SESSION["usuario"]))
{
	header('Location:Views/Home/index.php');
}
?>
<!doctype html>
<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">    
    <head>        
        <meta charset="utf-8">        
        <title> Login </title>            
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
        <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
        <link rel="stylesheet" href="alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="alertifyjs/css/alertify.min.css">
        <link rel="stylesheet" href="alertifyjs/css/alertify.rtl.css">
        <link rel="stylesheet" href="alertifyjs/css/alertify.rtl.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">        
        <script type="text/javascript" src="alertifyjs/alertify.js"></script>
        <script type="text/javascript" src="alertifyjs/alertify.min.js"></script>
                <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">                        
    </head>    
    <body>        
        <input type='hidden' id='error' value ="<?=$msg?>">"
        <div id="contenedor">
            <div id="central">
                <div id="login">

                    <div class="titulo">
                        Bienvenido
                    </div>
                    <form id="loginform" action="login.php" method="post" onsubmit="return validacion();" >
                        <input id="user" type="text" name="usuario" placeholder="Usuario" required>
                        <input id="pwd" type="password" placeholder="Contraseña" name="password" required>
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="#">¿No tienes Cuenta? Registrate</a>
                    </div>
                </div>
                <div class="inferior">
                    <a href="#">Volver</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">      
        error=document.getElementById('error');        
		if(error.value!="")
		{
			alertify.error(error.value);			
		}
        function validacion()
		{
			frm=document.getElementById('loginform');
			user=document.getElementById('user');
			pwd=document.getElementById('pwd');
            if(user.value=="")
			{
				alertify.error("Campo invalido");
				return false;			
			}
            if(pwd.value=="")
            {
                alertify.error("Campo invalido");
                return false;
            }
            return true;        
        }  
        </script>   
    </body>
</html>