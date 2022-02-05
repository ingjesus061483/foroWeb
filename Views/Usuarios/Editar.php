<?php
session_start();
$titulo="Editar usuario";
$modulo="Usuarios";
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/UsuariosController.php");

if (!isset($_SESSION["usuario"]))
{
  header('Location:../../login.php');
}
$UsuarioController=new UsuariosController();
$usuario=new Usuarios();
$combo="";
$msg="";
$id=0;
if (isset($_GET["id"]))
{
        $id=$_GET['id'];
        $UsuarioController->EditarGet($id,$usuario, $combo);
}
if (isset($_SESSION['usuario']))
{
    
    if (isset($_POST["enviar"]))
    {
        
        $id=$_POST["id"];
        $identificacion=$_POST["identificacion"];
        $prinombre=$_POST["prinombre"]; 
        $segnombre=$_POST["segnombre"];
        $priapellido=$_POST["priapellido"];
        $segapellido=$_POST["segapellido"];            
        $Direccion=$_POST["Direccion"];
        $telefono=$_POST["telefono"];
        $idperfil =$_POST["perfil"];
        $msg =$UsuarioController->EditarPost ($id, $identificacion, $prinombre ,$segnombre,$priapellido,
        $segapellido,$Direccion,$telefono,$idperfil,$combo );
    }
}
echo" <input type='hidden'  id='msg' value='$msg'/>";                
if ($usuario !=NULL) 
{
    $body=" 
    <div style='margin:0 auto;' class='card'>
        <div class='header'>
        $titulo
        </div>
        <div class='body'>   
            <div>        
                <form id ='frm' action='Editar.php' onsubmit ='return validacion();' method='post'> 
                    <input type='hidden' name='id' id='id' value='$usuario->id'/>
                    <label for='identificacion'>identificacion</label>
                    <input placeholder='tu identificacion..' type='text' value='$usuario->identificacion'id='identificacion' name ='identificacion' />			
                    <label for='prinombre'>primer nombre</label>
                    <input type='text'placeholder='tu primer nombre..' value='$usuario->prinombre' id='prinombre' name ='prinombre' />			
                    <label for='segnombre'>Segundo nombre</label>
                    <input type='text' placeholder='tu segundo nombre..'value='$usuario->segnombre' id='segnombre' name ='segnombre' />
                    <label for='priapellido'>primer apellido</label>
                    <input type='text' id='priapellido'placeholder='tu apellido..' value='$usuario->priapellido' name ='priapellido' />		
                    <label for='segapellido'>Segundo apellido</label>
                    <input type='text' id='segapellido'placeholder='tu segundo apellido..'value='$usuario->segapellido'  name ='segapellido' />					
                    <label for='Direccion'>Direccion</label>
                    <input type='text' placeholder='tu Direccion..' value='$usuario->Direccion' id='Direccion' name ='Direccion' />				
                    <label for='telefono'>Telefono</label>
                    <input type='text' placeholder='tu telefono..' value='$usuario->telefono' id='telefono' name ='telefono' />				
                    <label for='perfil'>perfil</label>
                    <select id='perfil' value='$usuario->idperfil' name ='perfil'>
                        $combo                
                    </select>
                    <div>
                        <button class='button' id='btnenviar' name='enviar'type='submit' >Enviar</button>		
                        <a class='button' href ='index.php' >Listado de usuarios</a>
                    </div>
                </form>	
            </div>	             
        </div>
    </div>
    ";
}
require_once("../../shared/Plantilla.php");
?>
<script type="text/javascript">
    msg=document.getElementById('msg');
    id=document.getElementById('id');
    if(msg.value!="")
    {
        alertify.success(msg.value);
        setTimeout(function() {window.location.href="Index.php";}, 5000);
    }
    function validacion()
    {
                frm=document.getElementById('frm');
                identificacion=document.getElementById('identificacion');
                prinombre=document.getElementById('prinombre');
                segnombre=document.getElementById('segnombre');
                priapellido=document.getElementById('priapellido');
                segapellido=document.getElementById('segapellido');
                direccion=document.getElementById('Direccion');
                telefono=document.getElementById('telefono');
                perfil=document.getElementById('perfil');
                if(identificacion.value=="")
                {
                    alertify.error("Campo invalido");
                    return false;
                
                }
                if(prinombre.value=="")
                {
                    alertify.error("Campo invalido");
                    return false;
                }
                if(priapellido.value=="")
                {
                    alertify.error("Campo invalido");
                    return false;
                }
                if(direccion.value=="")
                {
                    alertify.error("Campo invalido");
                    return false;
                }
                if(telefono.value=="")
                {
                    alertify.error("Campo invalido");
                    return false;
                }
                if(perfil.value==-1)
                {
                    alertify.error("Campo invalido");
                    return false;
                }
                frm.submit();
    }
 </script>

	