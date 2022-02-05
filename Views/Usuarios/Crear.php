
<?php
session_start();
$titulo="Creacion de usuarios";
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
$combo="";
$UsuarioController->CrearGet($combo);
$msg="";
if (!isset($_SESSION["usuario"]))
{
  header('Location:../../login.php');
}
if (isset($_SESSION['usuario']))
{
	if (isset($_POST["enviar"]))
	{
		$identificacion=$_POST["identificacion"];
		$prinombre=$_POST["prinombre"]; 
		$segnombre=$_POST["segnombre"];
		$priapellido=$_POST["priapellido"];
		$segapellido=$_POST["segapellido"];
		$direccion=$_POST["Direccion"];
		$telefono=$_POST["telefono"];
		$Email=$_POST["Email"];
		$usuario=$_POST["usuario"];
		$pwd=$_POST["pwd"];
		$idperfil =$_POST["perfil"];
		$msg =$UsuarioController->CrearPost	($identificacion, $prinombre ,$segnombre,$priapellido,
		$segapellido, $direccion, $telefono,$Email,$usuario,$pwd,$idperfil);				
	}
}
echo" <input type='hidden'  id='msg' value='$msg'/>";	
$body="
<div class='container'>
<div style='margin:0 auto;' class='card'>
	<div class='header'>
		$titulo
	</div>
	<div class='body'>   
		<div>
			<form id ='frm' action='Crear.php' onsubmit ='return validacion();'method='post'> 
				<label for='identificacion'>Identificacion</label>
				<input placeholder='tu identificacion..' type='text' id='identificacion' name ='identificacion' />			
				<label for='prinombre'>Primer nombre</label>
				<input type='text'placeholder='tu primer nombre..' id='prinombre' name ='prinombre' />			
				<label for='segnombre'>Segundo nombre</label>
				<input type='text' placeholder='tu segundo nombre..'id='segnombre' name ='segnombre' />
				<label for='priapellido'>primer apellido</label>
				<input type='text' id='priapellido'placeholder='tu apellido..' name ='priapellido' />		
				<label for='segapellido'>Segundo apellido</label>
				<input type='text' id='segapellido'placeholder='tu segundo apellido..' name ='segapellido' />					
				<label for='Direccion'>Direccion</label>
				<input type='text' placeholder='tu direccion..' id='Direccion' name ='Direccion' />				
				<label for='telefono'>Telefono</label>
				<input type='text' placeholder='tu telefono..' id='telefono' name ='telefono' />				
				<label for='Email'>Email</label>
				<input type='text' placeholder='tu email..' id='Email' name ='Email' />				
				<label for='Usuario'>Usuario</label>
				<input type='text' placeholder='tu usuario..' id='usuario' name ='usuario' />				
				<label for='Contraseña'>Contraseña</label>
				<input type='password' placeholder='tu contraseña..' id='pwd' name ='pwd' />				
				<label for='perfil'>perfil</label>
				<select id='perfil' name ='perfil'>
					<option value=-1 >seleccione un perfil </option> 
					$combo				
				</select>
				<div>
					<button class='button' id='btnenviar' name='enviar' type='submit'>Enviar</button>		
					<a class='button' href ='index.php' >Listado de usuarios</a>
				</div>
			</form>						
		</div>
	</div>	
</div>
";
require_once("../../shared/Plantilla.php");
?>
	
		<script type="text/javascript">
			msg=document.getElementById('msg');
		 
			if(msg.value!="")
			{
				alertify.success(msg.value);
				setTimeout(function() {window.location.href="Index.php";}, 5000);
			}
			function validarEmail(campo)
			{
				emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; //Se muestra un texto a modo de ejemplo, luego va a ser un icono       
				//Se muestra un texto a modo de ejemplo, luego va a ser un icono
				if (emailRegex.test(campo.value)) {
				return true;
				} else {
				return false;
				}
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
				email=document.getElementById('Email');
				usuario=document.getElementById('usuario');
				pwd=document.getElementById('pwd');
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
				if(email.value=="")
				{					
					alertify.error("Campo invalido");
					return false;
				}
				else{
					if(!validarEmail(email))
					{
						alertify.error("Campo invalido");
						return false;
					}
				}			
				if(usuario.value=="")
				{
					alertify.error("Campo invalido");
					return false;
				}
				
				if(pwd.value=="")
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
	</body>
</html>