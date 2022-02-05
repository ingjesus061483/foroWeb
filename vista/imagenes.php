<?php 
header("Content-type: image/jpg"); 
if(isset($_GET['id']))
{ 
    $id = $_GET['id']; 
    $con = mysqli_connect("localhost", "root", "","prueba") or die ("ERROR AL CONECTAR"); 
    $q = "SELECT foto FROM usuarios WHERE id = ".$id; 
    $result = mysqli_query($con,$q) or die(mysqli_error()); 
	while ($fila =mysqli_fetch_array($result))
	{
		$img =$fila[0];
	}
	
     
    echo $img; 
}
else
{
	print "../imagen/usuarios-guiartecom2.gif";
}
	
?>