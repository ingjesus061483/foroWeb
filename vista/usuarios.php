<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<!-- INICIO LIBRERIAS-->
	<link rel="stylesheet" href="../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
    <script language="JavaScript" type="text/javascript" src="../codejscript/usuario.js">

	
    </script>
<!-- FIN LIBRERIAS-->

<link  rel="stylesheet" href="../css/site.css" />
</head>
<body>
	<div id="title">
    	<div style="width:25%;">
    		<img class="imag" src="../imagen/usuarios-guiartecom2.gif" />
        </div>
        <div class="title" >
        	Usuarios
        </div>
        
    </div>
	<div id="container">
		<div class="margen">
			Nombre<input style="margin-left:20px" type="text" id="txtnombre" name ="nombre" />
		</div>
        <div class="margen">
			Apellido<input style="margin-left:20px" type="text" id="txtape" name ="nombre" />
		</div>
        <div class="margen">
			Direccion<input style="margin-left:10px" type="text" id="txtdir" name ="nombre" />
  		</div>
        <div class="margen">
			Telefono<input style="margin-left:15px" type="text" id="txtTel" name ="nombre" />
		</div>
        <div class="margen">
			Email<input style="margin-left:31px" type="text" id="txtEmail" name ="nombre" />
		</div >
        <div class="margen">
			Usuario<input style="margin-left:15px" type="text" id="txtUsuario" name ="nombre" />
		</div>
        <div class="margen">
			Pwd<input style="margin-left:35px" type="password" id="txtpwd" name ="nombre" />
		</div>
        <div class="margen">
			Ciudad<input style="margin-left:35px" type="text" id="txtciu" name ="nombre" />
    	</div>
        <div class="margen">
			<input disabled="disabled" type="text" id ="txtabrir" /><input type="button" id ="btnabrir"  value ="abrir"/> <input style="display:none;" type="file" id="txtfile" name ="nombre"  />
            
		</div>
        <img  id="btnnuevo" src="../images/limpiar.png" /><img id="btnguardar" src="../images/imgGuardar.png" />
    </div>
    <div id ="resultado">
    </div>
 
	
</body>
</html>