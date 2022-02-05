<?php
require_once("../classes/clforos.php");
$idforo=$_POST["idforo"];
$foro = new clforos();
$foro->inicializar($msg);
$foro->paMostrarRespuesta($idforo);
?>