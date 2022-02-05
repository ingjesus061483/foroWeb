<?php
//require("../vista/imagenes.php");
require_once("cldatos.php");
class clusuarios extends cldatos
{
	 private $tipoid,$identifcacion, $nombre ,$apellido,$direccion ,$telefono ,$usuario,$email,$pwd ,$tipo,$curso;
	function nuevo($tipoid,$identifcacion,$nombre,$apellido,$direccion  ,$telefono ,$usuario,$email,$pwd,$curso,$tipo )
	{
		$this->tipoid=$tipoid;
		$this->identifcacion=$identifcacion;
		$this->nombre=ucwords($nombre);
		$this->apellido=ucwords($apellido);
		$this->direccion=ucwords($direccion);
		$this->telefono=$telefono;
		$this->usuario=$usuario;
		$this->email=$email;
		$this->tipo=$tipo;
		$this->pwd=$pwd;
		$this->curso=$curso;
		
		//$this->pwd=md5($pwd);
	
	}
	function mostrar(&$msg)
	{
		$consulta="select id, nombre ,apellido,direccion, telefono,
			usuario,email from usuarios";
			$this->consultar($consulta,$result,$buscar,'buscar');
			if($buscar)
			{
				$cols =mysqli_num_fields($result);
				while ($fila =mysqli_fetch_array($result))
				{
					echo "<div>";
					echo " <p>Nombre: <span>".$fila [1]." ". $fila[2]."</span></p>";
					echo "<p>Direccion: <span> ".$fila[3]." ".$fila[4]."</span</p>";
					echo "<p>Telefono: <span> ".$fila[5]."</span></p>";
					echo "<p>Usuario: <span> ".$fila[6]."</span></p>";
					echo "<p>Email:<span> ".$fila[7]."</span></p>";
					echo "<p> 'imagenes.php?".$fila[0]."</p/";
					echo "<img src='imagenes.php?".$fila[0]. "'>";
					echo "</div>";
					
				}
				
			}
			
	}
	function paAgregarUsuario (&$msg,$sw)
	{
		$consulta="select *  from usuarios where usuario='".$this->usuario ."' or email='".$this->email."'";
		$this->consultar($consulta,$result,$buscar,'buscar');
		if(!$buscar)
		{
			$consulta="call paAgregarUsuario(".$this->tipoid.",'".$this->identifcacion."','".$this->nombre."','".$this->apellido
			."','".$this->direccion."','".$this->telefono."','".$this->usuario."','".$this->email."','".$this->pwd
			."','".$this->curso."',".$this->tipo.")";
			
			//$consulta="insert into usuarios(nombre ,apellido,direccion, telefono,
			//usuario,email,pwd,foto)values('".$this->nombre."','".$this->apellido."','".$this->direccion."','"
			//.$this->telefono."','".$this->usuario."','".$this->email."','".$this->pwd."')";
			$mg="registro insertado correctamente ";
     	}
		else
		{
			if($sw==1) 
			{
				$consulta="update usuarios set nombre ='".$this->nombre."', apellido='".$this->apellido.
				"', direccion='".$this->direccion."',ciudad='".$this->ciudad."',telefono='".$this->telefono.
				"' where usuario='".$this->usuario ."' or email='".$this->email."'" ;
				$mg="registro actualizado ";
			}
			else
			{
				$mg="el usuario o email no estan disponibles ";
			}
		}
		$this->consultar($consulta,$result,$buscar,'');		
		$msg=$mg;

	}
	function eliminar (&$msg)
	{
		$consulta ="delete from usuarios where usuario='".$this->usuario."'";
	$this->consultar($consulta,$result,$buscar,"");
	
	}
	function validar(&$msg)
	{

		$consulta="call paValidarUsuario('".$this->usuario."','".$this->email ."','".$this->pwd ."')";
		$this->consultar($consulta,$result,$buscar,"buscar");
		if($buscar)
		{
			while ($fila=mysqli_fetch_array($result))
			{
				$id=$fila["idusuario"];
				$nom =$fila["nombres"];
				$usu=$fila["usuario"];
				$ema=$fila["email"];
				$tipoid=$fila["tipo_usuario"];
				$idtipoid=$fila["idtipoid"];
			}
			$msg="  presinone <a href ='vista/principal.php?id=".$id."&nom=".$nom.
			"&usu=".$usu."&email=".$ema."&idtipoid=".$idtipoid.			"'> aqui </a> para ingresar como ".$tipoid."  ".$nom;
			
		}
		else
		{
			$msg="usuario o contraseña invalido  registrate ";
		}
		
	}
	
	
}
?> 