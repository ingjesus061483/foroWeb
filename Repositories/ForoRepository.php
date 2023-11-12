<?php
require_once("DataAccess.php");
require_once("../Model/Foro.php");
class ForoRepository extends DataAccess
{
	private Foro $foro;
	public function __construct()
    {
		$this-> AbrirConexion ();
	}	
	
    public function GetAll()
	{	
		try
		{			
			$result=$this->con->prepare("SELECT * FROM foros");		
			$result->execute();
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result;		
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
	public function Store($request)
	{
		try
		{			
			$result=$this->con->prepare("INSERT INTO foros(titulo, mensaje,fecha,usuario_id) values(:titulo,:mensaje,
										:fecha,:usuario)");	
			$result->bindParam(":titulo",$request->titulo);
			$result->bindParam(":mensaje",$request->mensaje);
			$result->bindParam(":fecha",$request->fecha);
			$result->bindParam(":usuario",$request->usuario_id);													
			$result->execute();
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
	public function Find($id)
	{
		try
		{			
			$result=$this->con->prepare("SELECT * FROM foros where id=:id");		
			$result->bindParam(":id",$id);
			$result->execute();
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result;		
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}	
	}
	public function Update($id, $request)
	{
		try
		{			
			$result=$this->con->prepare("UPDATE foros Set titulo=:titulo, mensaje=:mensaje,
									    fecha=:fecha,usuario_id =:usuario where id=:id");	
			$result->bindParam(":titulo",$request->titulo);
			$result->bindParam(":mensaje",$request->mensaje);
			$result->bindParam(":fecha",$request->fecha);
			$result->bindParam(":usuario",$request->usuario_id);										
			$result->bindParam(":id",$id);
			$result->execute();
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
	public function Delete($id)
	{
		try
		{			
			$result=$this->con->prepare("DELETE FROM foros WHERE id=:id");		
			$result->bindParam(":id",$id);
			$result->execute();			
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
}


