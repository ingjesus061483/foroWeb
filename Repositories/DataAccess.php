<?php
abstract class DataAccess
{
	protected PDO $con;
	protected $dsn;
	protected $consulta;
	public abstract function GetAll();
	public abstract function Find($id);
	public abstract function Store($request);
	public abstract function Update($id ,$request);
	public abstract function Delete($id);
	protected function AbrirConexion ()
	{
		try 
		{
			$this->dsn = "mysql:host=localhost;dbname=test";			
			$this->con = new PDO($this->dsn,'jmora', '72285908jm');			
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		} 
		catch (PDOException $e)
		{
			die( $e->getMessage());
		}	
	}
	protected function EjecutarConsulta($consulta,$params=null)
	{
		try
		{
			$stmt=$this->con->prepare($consulta);
			if($params!=null)
			{
				$stmt->execute($params);		 
			}
			else
			{
				$stmt->execute();
			}
			return $stmt;
		}
		catch(PDOException $e)
		{
			die( $e->getMessage());
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
					  //$imagenEscapes=mysqli_real_escape_string($this->con,file_get_contents($archivo["tmp_name"]));
					  
				 }
				 
		}
		return $imagenEscapes;
	}
}