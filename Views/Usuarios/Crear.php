<?php
$titulo="Crear usuarios";
include('../../Shared/head.php');
$UsuarioController=new UsuarioController();
$UsuarioController->Create($rows);
$msg="";
if (isset($_POST["enviar"]))
{
	$request=(object)$_POST;	
	$msg =$UsuarioController->store	($request);		
	header('Location:index.php');	
}
?>
<div  style='margin:0 auto;' class='card  mb-4'>		
	<form id ='frm' action='Crear.php' onsubmit ='return validacion();'method='post'>
		<div class="mb-3">
			<label for='identificacion' class="form-label">Identificacion</label>			
			<input placeholder='tu identificacion..' class="form-control" type='text' id='identificacion' name ='identificacion' />			
		</div>
		<div class="mb-3">
			<label for='prinombre' class="form-label"> Nombre</label>								
			<input type='text'placeholder='tu primer nombre..' class="form-control" id='nombre' name ='nombre' />						
		</div>
		<div class="mb-3">
			<label for='priapellido' class="form-label">Apellido</label>					
			<input type='text' class="form-control" id='apellido'placeholder='tu apellido..' name ='apellido' />			
		</div>
		<div class="mb-3">
			<label for='Direccion' class="form-label">Direccion</label>			
			<input type='text' class="form-control" placeholder='tu direccion..' id='Direccion' name ='direccion' />							
		</div>
		<div class="mb-3">
			<label for='telefono' class="form-label">Telefono</label>								
			<input type='text' class="form-control" placeholder='tu telefono..' id='telefono' name ='telefono' />							
		</div>
		<div class="mb-3">
			<label for='Email' class="form-label" >Email</label>			
			<input type='text' placeholder='tu email..' class="form-control" id='Email' name ='email' />							
		</div>
		<div class="mb-3">
			<label for='Usuario' class="form-label">Usuario</label>								
			<input type='text' placeholder='tu usuario..' class="form-control" id='usuario' name ='usuario' />							
		</div>
		<div class="mb-3">
			<label for='Contraseña' class="form-label">Contraseña</label>			
			<input type='password' placeholder='tu contraseña..'class="form-control"  id='pwd' name ='password' />							
		</div>
		<div class="mb-3">
			<label for='perfil' class="form-label" >Perfil</label>			
			<select id='perfil'class="form-control" name ='perfil'>				
				<option value="" >seleccione un perfil </option> 				
				<?php while($row = $rows->fetch()){ ?>					
				<option value="<?=$row->id?>"><?=$row->nombre?></option>			
				<?php }?>
			</select>			
		</div>
		<br>
		<a class='btn btn-primary' href ='index.php' >Regresar</a>		
		<button class='btn btn-success' id='btnenviar' name='enviar' type='submit'>Guardar</button>									
	</form>				
</div>
<script type="text/javascript">
function validarEmail(campo)	
{	
	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; 
		//Se muestra un texto a modo de ejemplo, luego va a ser un icono       		
		//Se muestra un texto a modo de ejemplo, luego va a ser un icono		
	if (emailRegex.test(campo.value)) 	
	{	
		return true;			
	}	
	else 			
	{		
		return false;		
	}	
}
function validacion()	
{	
	frm=document.getElementById('frm');			
	identificacion=document.getElementById('identificacion');			
	prinombre=document.getElementById('nombre');				
	priapellido=document.getElementById('apellido');		
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
	else if(!validarEmail(email))		
	{			
		alertify.error("Campo invalido");			
		return false;		
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
	if(perfil.value=="")
	{			
		alertify.error("Campo invalido");					
		return false;		
	}	
	frm.submit();	
}	
</script>
<?php
include("../../shared/foot.php");
?>
	