<?php
require_once("imagenes.php");
?>
<html>
<head>
    <title></title>
   	<link rel="stylesheet" href="../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
  
    <script type="text/javascript" src="functions.js"></script>
 
<style type="text/css">
    .messages{
        float: left;
        font-family: sans-serif;
        display: none;
    }
    .info{
        padding: 10px;
        border-radius: 10px;
        background: orange;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .before{
        padding: 10px;
        border-radius: 10px;
        background: blue;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .success{
        padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
    .error{
        padding: 10px;
        border-radius: 10px;
        background: red;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }
</style>
</head>
<body>
    <!--el enctype debe soportar subida de archivos con multipart/form-data-->
    <form enctype="multipart/form-data" class="formulario">
        <label>Subir un archivo</label><br />
        <input name="archivo" type="file" id="imagen" /><br /><br />
        <input type="button" value="Subir imagen" /><br />
    </form>
<img src="imagenes.php" alt="Img" />
    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
</body>
</html>