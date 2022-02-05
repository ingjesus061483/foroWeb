<?php

class Conectar{

public static function con(){
$con= mysql_connect("localhost","root","in00340");
mysql_query("SET NAMES 'utf8'");
mysql_select_db("venta");
return $con;
}

}

class Reporte{

   private $ventas;
   
    public function__construct(){
	 $this->ventas= array();
	 }
	 
	 public function get_ventas(){
	 
	  $sql="select * from ventas";
	  $res= mysql_query($sql,Conectar::con());
	  while($reg = mysql_fetch_assoc($res)){
	  $this->ventas[]= $reg;
	  }
	  return $this->ventas;
	  }
	  }











?>