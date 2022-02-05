<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once("menu.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titulo;?></title>
<!-- INICIO LIBRERIAS-->
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="../../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
<link rel="stylesheet" href="../../javascript/jquery-ui-1.10.3.custom/development-bundle/themes/start/jquery-ui.css">
<link rel="stylesheet" href="../../alertifyjs/css/alertify.css">
<link rel="stylesheet" href="../../alertifyjs/css/alertify.min.css">
<link rel="stylesheet" href="../../alertifyjs/css/alertify.rtl.css">
<link rel="stylesheet" href="../../alertifyjs/css/alertify.rtl.min.css">
<script type="text/javascript" src="../../alertifyjs/alertify.js"></script>
<script type="text/javascript" src="../../alertifyjs/alertify.min.js"></script>
<script type="text/javascript" src="../../javascript/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../javascript/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script><!-- FIN LIBRERIAS-->
<!-- FIN LIBRERIAS-->
</head>
<body>
   <?php
      echo $menu;
   ?>  
   <div class="container">
       <?php echo  $body;    ?>
   </div>
</body>
</html>
