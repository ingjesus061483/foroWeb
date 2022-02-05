<?php
session_start();
$titulo="Detalle de Usuario";
$modulo="Usuarios";
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/UsuariosController.php");
$UsuarioController=new UsuariosController();
$msg="";
$error="";
if (!isset($_SESSION["usuario"]))
{
  header('Location:../../login.php');
}
if (isset($_SESSION["usuario"]))
{
    if (isset($_GET["id"]))
    {
         $id=$_GET['id'];    
    }
    if (isset($_POST["enviar"]))
    {
        $id=$_POST["id"];
        $UsuarioController->EliminarPost($id,$msg,$error) ;            
    }

}
$usuario=$UsuarioController->DetalleGet($id);
echo" <input type='hidden'  id='msg' value='$msg'/>";
echo" <input type='hidden'  id='error' value='$error'/>";
if($usuario!=null)
{    
    $perfil=$usuario->Perfil;    
    $body=" 
        <div style='margin:0 auto;' class='card'>
            <div class='header'>
                $titulo
            </div>         
            <div class='body'>         
                <form id='frm' onsubmit='return Validar();' method='post' action='Detalles.php' >
                    <div>
                        <input type='hidden' name='id' id='id' value='$id'/>           
                        <p><strong>indentificacion:</strong>  $usuario->identificacion </p>
                        <p><strong>Nombre completo:</strong>$usuario->prinombre $usuario->segnombre $usuario->priapellido 
                        $usuario->segapellido</p>
                        <p><strong>Direccion:</strong> $usuario->Direccion</p>
                        <p><strong>Telefono:</strong> $usuario->telefono</p>
                        <p><strong>Perfil:</strong> $perfil->nombre</p>
                    </div>
                    <div>
                        <div style ='padding: 10px;float:right; '>
                            <button   class='button' type='submit' name ='enviar' >Elimimar</button>
                                <a  class='button' href='editar.php?id=$usuario->id' >Editar</a>   
                                <a  class='button' href ='index.php' >Listado de usuarios</a>
                            </div>
                        </div>          
                </form>
            </diV>  
        </div>";
 }
 require_once("../../shared/Plantilla.php");
 ?>
?>

       
    	
    <script type="text/javascript">
    frm=document.getElementById('frm');
    msg=document.getElementById('msg');
    error=document.getElementById('error');
    idusuario=document.getElementById('idusuario');
    function Validar()
    {
        permitir=false;
        resp=window.confirm('Desea eliminar este usuario?');
        if(resp)
        {
            permitir =true;                                   
        }
        return permitir;       
    }
    if(error.value!="")
    {
        alertify.error(error.value);   
    }
	if(msg.value!="")
	{
        alertify.success(msg.value);
   		//alert(msg.value);
		setTimeout(function() {window.location.href="Index.php";}, 5000);
	}
 </scripT>
