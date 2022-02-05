<?php
session_start();
$titulo="";
require_once("Model/Usuarios.php");
require_once("Model/Perfil.php");
require_once("Data/DataAccess.php");
require_once("Controllers/UsuariosController.php");
$usuario=new UsuariosController();
$msg="";
$id=0;
if (isset($_POST["Ingresar"]))
{    
    $user=$_POST["usuario"];
    $pwd=$_POST["password"]; 
    $usuario->login($user,$pwd,$msg);    
}
if (isset($_SESSION['usuario']))
{
    header('Location:Views/Home/index.php');
}
echo"<input type='hidden' id='error' value ='$msg'>";
echo"<input type='hidden' id='id' value ='$id'>";
?>
<!doctype html>
<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Muestra de un formulario de acceso en HTML y CSS">
        <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
        
        <link rel="stylesheet" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.rtl.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.rtl.min.css">
    <script type="text/javascript" src="alertifyjs/alertify.js"></script>
    <script type="text/javascript" src="alertifyjs/alertify.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>        
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
     id=document.getElementById('id');
		if(error.value!="")
		{
			alertify.error(error.value);			
		}
       // if(id.value!=0)
        //{
          //  setTimeout(function() {window.location.href="Index.php";}, 5000);
        //}
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
                return false ;
            }
            frm.submit();

        }  
        </script>   
    </body>
</html>