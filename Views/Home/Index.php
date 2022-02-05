<?php
$titulo="";
$modulo="inicio";
session_start();
if(isset($_POST["enviar"]))
{
  unset($_SESSION['usuario']);
}

if (!isset($_SESSION['usuario']))
{
  header('Location:../../login.php');
}
$id=$_SESSION['usuario'];
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/HomeController.php");
$HomeController=new HomeController();
$usuario=NULL;
$HomeController->index($usuario);
$perfil=$usuario->Perfil;
$body="
<div style='float: right;' class='card'>
    <div class='header'>
       Usuario conectado
    </div>
    <div class='body'>            
        <form id='frm' onsubmit='return validar()' method='post' action='index.php' >
            <p><strong>indentificacion:</strong>  $usuario->identificacion </p>
            <p><strong>Nombre completo:</strong>$usuario->prinombre $usuario->segnombre $usuario->priapellido 
            $usuario->segapellido</p>
            <p><strong>Direccion:</strong> $usuario->Direccion</p>
            <p><strong>Telefono:</strong> $usuario->telefono</p>
            <p><strong>Perfil:</strong> $perfil->nombre</p>          
            </div>
            <div style='padding :10px;'>
                <button  class='button' type='submit' name ='enviar' >Cerrar sesion</button>
                <a  class='button' href='../Usuarios/editar.php?id=$usuario->id' >Editar</a>   
                <a  class='button' href='../../Shared/passwordchange.php' >Cambiar contraseña</a>				
            </diV>
        </form>
    </div>
</div>";
require_once("../../shared/Plantilla.php");
?>
<script type="text/javascript"> 	
     function validar()
     {      
        permitir=false;
        resp=window.confirm('Desea salir de esta sesion?');
        if(resp)
        {
            permitir =true;                                   
        }
        console.log("permitir",permitir) ;  
        return permitir;
     }	
  </script>