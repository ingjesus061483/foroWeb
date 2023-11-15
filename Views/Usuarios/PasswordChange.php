<?php
$titulo="Cambio de contraseña";
$msg="";
include('../../Shared/head.php');
$usuarioController=new UsuarioController();
$id=0;
if (isset($_POST["Ingresar"]))
{
    $request=(object)$_POST;
    $oldpwd=$_POST["oldpwd"];    
    $newpwd=$_POST["newpwd"];    
    $id=$usuarioController->PasswordChange($usuario,$oldpwd,$newpwd,$msg );      
    if($id!=0)    
    {        
        unset($_SESSION['usuario']);      
    }
}
if (!isset($_SESSION['usuario']))
{
    header('Location:../login.php');
}
?>
<div id="login">
    <form id="loginform" action="passwordchange.php" method="post" onsubmit="return validacion();" >
       <div class="mb-3">
			<label for='identificacion' class="form-label">Usuario</label>			
            <input id="user" class="form-control" type="text" value="<?=$usuario->email;?>" name="usuario"disabled="disabled"  placeholder="Usuario" required>
       </div>
       <div class="mb-3">
			<label for='identificacion' class="form-label">Contraseña antigua</label>			            
            <input id="oldpwd" class="form-control" type="password" name="oldpwd" placeholder="Contraseña antigua" required>
       </div>
       <div class="mb-3">
			<label for='identificacion' class="form-label">Contraseña nueva</label>			            
            <input id="pwd" class="form-control" type="password" placeholder="Contraseña" name="newpwd" required>                        
       </div>
       <br>
       <button type="submit" class="btn btn-success" name="CambiarContraseña">Cambiar contraseña</button>    
    </form>
</div>     
<script type="text/javascript">
 	error=document.getElementById('error');
    id=document.getElementById('id');	
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
        return true;    
    }  
</script>   
<?php
include("../../shared/foot.php");
    