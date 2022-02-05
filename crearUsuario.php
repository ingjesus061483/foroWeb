<?php
require("classes/clusuarios.php");
$objusuario=new clusuarios();
$objusuario->inicializar($msg);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>validacion de usuarios</title>
<link rel="stylesheet" href="css/site.css" />
	<link rel="stylesheet" href="javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<script type="text/javascript" src="javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
    <script language="JavaScript" type="text/javascript" src="codejscript/usuario.js"></script>

</head>
<body style=" background-image:url(images/Sin%20t%C3%ADtulo.jpg);">
	<div  class="shadow"   style="margin-top:30px; margin:0 auto; background:rgb(61,24,249); color:#FFF;padding-bottom:10px; padding-top:10px ; padding-right:20px; height:150px; width:500px;">
    <form id="frmValidar" action="index.php" method="post">
        	<div  >
             	<div style=" float:left" >
                	<img  id ="icon"src="images/Admin Personal.png"/>
                </div>
                <div style="float:left;"  >
                	<p>Usuario o email	<input type="text" id ="txtusuarioEmail" name="user" /> </p>
                    <p>Contraseña <input style="margin-left:30px;" type="password" id ="txtpwdus" name="pwd" /> </p>
                    <p style="float:right;"><input type="button" id ="btnenviar"  name ="btnenviar" value ="Entrar" /> <input type="button" id="registrar" value ="Registrate" class="button" /></p>
                </div>
            </div>
        </form>
	</div>
    
<?php

$msg="";

if (isset($_POST["btnenviar"])){
	if($_POST["user"]!="" && $_POST["pwd"]!="")
	{	
		$objusuario->nuevo('','','',''.'','','',$_POST["user"],$_POST["user"],$_POST["pwd"],'',0);
		$objusuario->validar($msg);
		echo"<p style=' margin:0 auto; ' class='par'>". $msg."</p>";
	}
	else
	{
		echo"<p style=' margin:0 auto; ' class='par' > los campos son nulos vuelva a intertarlo</p>";
		
		
	}
}
?>
	<div id="container" >
    	<!--<img  src="images/muneco_ con_llave_candado.jpg"  style="width:500px; height:500px; margin-left:10px; " />-->
        <div style="margin-left:50px;margin-top: 50px">
            <form  enctype="multipart/form-data" action="index.php" method="post">
            
                <div class="margen">
                    Tipo de indentificacion<select name="tipoid" id="combo" ><?php $objusuario->llenarCombo("tipo_identificacion"); ?>                    
                    </select>
                    Identicacion<input style="margin-left:30px;" type="text" id="txtape" name ="identificacion" />
                </div>
                
                <div class="margen">
                    Nombre<input style="margin-left:30px" type="text" id="txtnombre" name ="nombre" />
                    Apellido<input style="margin-left:30px" type="text" id="txtape" name ="apellido" />
                </div>
                <div class="margen">
                    Direccion<input style="margin-left:30px" type="text" id="txtdir" name ="direccion" />
                    Telefono<input style="margin-left:30px" type="text" id="txtTel" name ="telefono" />
                </div>
                <div class="margen">
                    Email<input style="margin-left:30px" type="text" id="txtEmail" name ="email" />
                    Usuario<input style="margin-left:30px" type="text" id="txtUsuario" name ="usuario" />
                </div>
                <div class="margen">
                    Pwd<input style="margin-left:30px" type="password" id="txtpwd" name ="pwd" />
                    Curso<input type="text" id="curso" name ="curso" />
	   				tipo<select name="tipo">
                    	<option value=2> Alumno</option>
                        <option value=3>profesor</option>
                    </select>
                </div>
                <div class="margen">
                    <button type="submit" name="registrar">registrarte </button>
                </div>
            </form>
            <img  id="btnnuevo" src="images/limpiar.png" /><img id="btnguardar" src="images/imgGuardar.png" />
	        <input type="hidden" id="tipo" value ="0" />
    	    <div  id="resultado">
        		<?php
				if (isset ($_POST["registrar"]))
				{
						$objusuario->nuevo
					($_POST["tipoid"],$_POST["identificacion"],$_POST["nombre"] ,$_POST["apellido"],$_POST["direccion"]
	    			, $_POST["telefono"],$_POST["usuario"],$_POST["email"],$_POST["pwd"],$_POST["curso"],$_POST["tipo"]);
					$objusuario->paAgregarUsuario($msg,1);
					echo $msg;
				}
        		?>
        	</div>
   	  </div>
</div>
    


</body>
</html>