<?php
$titulo="Editar usuario";
$msg="";
require_once("../../shared/head.php");

$modulo="Usuarios";
$UsuarioController=new UsuarioController();

$id=0;
if (isset($_GET["id"]))
{    
    $id=$_GET['id'];       
}
if (isset($_POST["enviar"]))
{
    $request=(object)$_POST;       
    $id=$request->id; 
    $msg =$UsuarioController->update ($id, $request,$rows );
    header('Location:index.php');	
}
$usuario= $UsuarioController->Edit($id, $rows);
?>
<div style='margin:0 auto;' class='card'>
   <form id ='frm' action='Editar.php' onsubmit ='return validacion();' method='post'>    
        <input type='hidden' name='id' id='id' value="<?=$usuario->id?>"/>
        <div class="mb-3">
            <label for='identificacion' class="form-label">Identificacion</label>			
			<input placeholder='tu identificacion..' value="<?=$usuario!=null?$usuario->identificacion:''?>" class="form-control" type='text' id='identificacion' name ='identificacion' />			
		</div>
		<div class="mb-3">
			<label for='prinombre' class="form-label"> Nombre</label>								
			<input type='text'placeholder='tu primer nombre..'value="<?=$usuario!=null?$usuario->nombre:''?>" class="form-control" id='nombre' name ='nombre' />						
		</div>        
        <div class="mb-3">
			<label for='priapellido' class="form-label">Apellido</label>					
			<input type='text' class="form-control" id='apellido'placeholder='tu apellido..'value="<?=$usuario!=null?$usuario->apellido:''?>" name ='apellido' />			
		</div>        
        <div class="mb-3">
			<label for='Direccion' class="form-label">Direccion</label>			
			<input type='text' class="form-control" value="<?=$usuario!=null?$usuario->direccion:''?>" placeholder='tu direccion..' id='Direccion' name ='direccion' />							
		</div>        
        <div class="mb-3">
			<label for='telefono' class="form-label">Telefono</label>								
			<input type='text' class="form-control" placeholder='tu telefono..' id='telefono' value="<?=$usuario!=null? $usuario->telefono:''?>" name ='telefono' />							
		</div>        
        <div class="mb-3">
			<label for='Email' class="form-label" >Email</label>			
			<input type='text' placeholder='tu email..' class="form-control" value="<?=$usuario!=null? $usuario->email:''?>" id='Email' name ='email' />							
		</div>
		<div class="mb-3">
			<label for='Usuario' class="form-label">Usuario</label>								
			<input type='text' placeholder='tu usuario..' class="form-control" id='usuario' value="<?=$usuario!=null? $usuario->usuario:''?>" name ='usuario' />							
		</div>
		<div class="mb-3">
			<label for='Contraseña' class="form-label">Contraseña</label>			
			<input type='password' value="<?=$usuario!=null? $usuario->pwd:''?>" placeholder='tu contraseña..'class="form-control"  id='pwd' name ='password' />							
		</div>
		<div class="mb-3">
			<label for='perfil' class="form-label" >Perfil</label>			
			<select id='perfil'class="form-control" name ='perfil'>				
				<option value="" >seleccione un perfil </option> 	
				<?php while($row = $rows->fetch()){ ?>	
				<option value="<?=$row->id?>"<?=$usuario!=null?($usuario->Perfil->id==$row->id?'selected':''):''?>><?=$row->nombre?></option>			
		    	<?php }?>
			</select>			        
        </div>        
        <br>        
        <a class='btn btn-primary' href ='index.php' >Regresar</a>		
		<button class='btn btn-success' id='btnenviar' name='enviar' type='submit'>Guardar</button>					    
    </form>
</div>
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
                prinombre=document.getElementById('nombre');               
                priapellido=document.getElementById('apellido');                
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
