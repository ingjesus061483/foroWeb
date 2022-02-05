<?php
//require("../vista/imagenes.php");
require("../classes/clusuarios.php");
require("../classes/clforos.php");
$hoy=getdate();
$objusuario=new clusuarios();
//$foro =new clforos(0,"","","",$hoy);
$foro =new clforos();

$foro->inicializar($msg);
$objusuario->inicializar($msg);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
  <script language="JavaScript" type="text/javascript" src="../codejscript/usuario.js"> </script>
<title>Foros</title>
<link rel="stylesheet" href="../css/principal.css"  />
</head>

<body>
	<div  id="head" style="margin-top:-9px; background:#006; padding-right:10px; color:#FFF;"  >
		<?php
			if ($_GET["nom"]!="" && $_GET["usu"]!="" && $_GET["email"]!="")
			{
				echo  "<form action='../index.php' ><p align=right > Usuario: <span style='padding-left:10px;' id=editar>". $_GET["nom"].
				"<input type='submit' id='cerrar' name='enviar' style=' margin-left:5px;cursor:pointer; ' value='Cerrar sesion'>
				</span>"; 
				$replace= str_replace(" ","%",$_GET["nom"]);
				$arr=explode("%",$replace);
				$nom=$arr[0];
				$ape=$arr[1];
				$idadmin=$_GET["id"];
				$usu=$_GET["usu"];
				$ema=$_GET["email"];
				$idtipous=$_GET["idtipoid"];
				if($idtipous==1)
				{
				echo"	<input type='button' id='btnñadidrForo' value='Añadir foro'>";
					}
				echo"<input type='hidden' name='idtipoid' id ='idtipoid' value='".$idtipous."'>";
				echo"<input type='hidden' name='id' id ='id' value='".$idadmin."'>";
				echo"<input type='hidden' id ='usu' value='".$usu."'>";
				echo"<input type='hidden' id ='ema' value='".$ema."'>";
				echo"<input type='hidden' id ='nom' value='".$nom."'>";
				echo"<input type='hidden' id ='ape' value='".$ape."'>";
			?>
            </form>
	</div>
	<?php
		$mostrar="";
		$foro->mostrarForosAdministrador($mostrar,$idtipous,$idadmin);
		echo $mostrar;
		}
		else
		{
			echo "inicie sesion";
		}
		if(isset($btn))
		{
			echo"obre bien";
			
		}
	?> 
      <div id="frmAñadirForo">
      	<form action="principal.php"method="post">
    	<p>Titulo:<input type="text" id="titulo" name="titulo" style="width:300px; " />  </p>
        <p>Mensaje:</p>
    	<p style="margin-top:-10px;"><textarea class ="textarea" id ="txtmensajebienvenida" name="bienvenido" >
        </textarea></p>
        
        </form>
      <div id="resultado">
      	
      </div>
      
    </div>
  
    <div id="frmRespuesta">
    	<?php
        echo"<p>".$nom." ".$ape." responde:</p>";
        ?>	
    	<p style="margin-top:-10px;"><textarea class ="textarea" id ="mensajeRespuesta"  >
        </textarea></p>
        <div id="resultadoRespuesta" ></div>
      
    </div>

    <div id="edicion">
    	<p>Nombre<input  disabled="disabled" style="margin-left:20px; padding-left:10px; " type="text" id="txtnombre" name ="nombre" /></p>
        <p>Apellido<input disabled="disabled" style="margin-left:20px;padding-left:10px; " type="text" id="txtape" name ="nombre" /></p>
		<p>Direccion<input style="margin-left:10px; padding-left:10px;" type="text" id="txtdir" name ="nombre" /></p>
		<p>Telefono<input style="margin-left:15px; padding-left:10px;" type="text" id="txtTel" name ="nombre" /></p>
		<p>Email<input  disabled="disabled" style="margin-left:31px;padding-left:10px;" type="text" id="txtEmail" name ="nombre" /></p>
		<p>Usuario<input disabled="disabled" style="margin-left:15px;padding-left:10px;" type="text" id="txtUsuario" name ="nombre" /></p>
		<p>Pwd<input style="margin-left:35px;padding-left:10px;" type="password" id="txtpwd" name ="nombre" /></p>
		<p>Ciudad<input style="margin-left:35px;padding-left:10px;" type="text" id="txtciu" name ="nombre" /></p>
    	<p><input disabled="disabled" type="text" id ="txtabrir" /><input type="button" id ="btnabrir"  value ="abrir"/>
        <input style="display:none;" type="file" id="txtfile" name ="nombre"  /></p>
        <input type="hidden" id="tipo" value ="1" />
		<img id="btnguardar" src="../images/imgGuardar.png" /><img id="inicio" src="../images/inicio.png" />
    </div>
    </div>
    
</body>
</html>