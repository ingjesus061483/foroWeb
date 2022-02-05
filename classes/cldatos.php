<?php

class cldatos
{
	var $con ,$bd;
	public function llenarCombo($tabla)
	{
		$consulta="select id,descripcion from ".$tabla;
		$this->consultar($consulta,$result,$buscar,"buscar");
		if($buscar)
		{
			while($fila=mysqli_fetch_array($result))
			{
				echo"<option value=".$fila[0].">".$fila[1]."</option>";
			}
		}
		
	}
	public function codificar_imagen($archivo)
	{
		$imagenEscapes="";
		if (is_uploaded_file($archivo["tmp_name"]))
		{
				 if ($archivo["type"]=="image/jpeg" || 
				 $archivo["type"]=="image/pjpeg" || 
				 $archivo["type"]=="image/gif" || 
				 $archivo["type"]=="image/bmp" || 
				 $archivo["type"]=="image/png")
				 {
					  $info=getimagesize($archivo["tmp_name"]);
					  $imagenEscapes=mysqli_real_escape_string($this->con,file_get_contents($archivo["tmp_name"]));
					  
				 }
				 
		}
		return $imagenEscapes;
	}

	public function inicializar (&$msg){
		$this->con=mysqli_connect('localhost','root','',"foro") or die (mysqli_error($this->con));
		//$bd =mysqli_select_db('prueba',$this->con)or die (mysql_error());
		$msg="conexion ok";
		
	}
	function consultar($consulta,&$result,&$buscar,$tipo){
		$result=mysqli_query($this->con,$consulta) or die (mysqli_error($this->con));
		if ($tipo=="buscar")
		{
			$num =mysqli_num_rows($result);
	     	if( $num!=0)
			{
				$buscar =true;
				
			}
			else
			{
				$buscar=false;
				
			}
		}
	}
			
	
}
?>