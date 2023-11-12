<?php

class Conectar
{
	public static function con()
	{
		$con= mysqli_connect("localhost","root","in00340");
		mysqli_query($con, "SET NAMES 'utf8'");
		mysqli_select_db($con,"venta");
		return $con;
	}
}

class Reporte
{
	private $ventas;
	public function __construct() 
    {
		$this->ventas= array();	
	}
	public function get_ventas()
	{
	 
	  $sql="select * from ventas";
	  $res= mysqli_query(Conectar::con(),$sql);
	  while($reg = mysqli_fetch_assoc($res))
	  {
		$this->ventas[]= $reg;
	  }
	  return $this->ventas;
	}
}











