
<?php
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/PerfilesController.php");
$titulo="Crear perfiles";
session_start();
$modulo="Perfiles";
if (!isset($_SESSION['usuario']))
{
  header('Location:../../login.php');
}
$msg="";
$error="";
$PerfilesController=new PerfilesController();
if (isset($_SESSION['usuario']))
{
    if (isset($_POST["enviar"]))
    {
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"]; 
        $PerfilesController->CrearPost($nombre,$descripcion,$msg,$error);
    }
}
echo" <input type='hidden'  id='msg' value='$msg'/>";	
echo" <input type='hidden'  id='error' value='$error'/>";	
$body="
    <div style='margin:0 auto;' class='card'>
        <div class='header'>
        $titulo
        </div>
        <div class='body'>  
        <div>
            <form id ='frm' action='Crear.php' onsubmit ='return validacion();'method='post'> 
                <label for='Nombre'>Nombre</label>
                <input placeholder='nombre perfil..' type='text' id='nombre' name ='nombre' />			
                <label for='Descripcion'>Descripcion</label>
                <textarea type='text' id='Descripcion' name ='descripcion' >

                </textarea>			
                <div>
                    <button class='button' id='btnenviar' name='enviar' type='submit'>Enviar</button>		
                    <a class='button' href ='index.php' >Listado de Perfiles</a>
                </div>
            </form>						
        </div>	
        </div> 
    </div>";
    require_once("../../shared/Plantilla.php");
?>

   

    <script type="text/javascript">
			msg=document.getElementById('msg');
            error=document.getElementById('error');
	        frm=document.getElementById('frm');
            nombre=document.getElementById('nombre');
			if(msg.value!="")
			{
				alertify.success(msg.value);
				setTimeout(function() {window.location.href="Index.php";}, 5000);
			}				
            if(error.value!="")
			{
				alertify.error(error.value);				
			}				
            function validacion()
			{
				
                if(nombre.value=="")
				{
					alertify.error("Campo invalido");
					return false;
				
				}
				frm.submit();
			}
        </script>


