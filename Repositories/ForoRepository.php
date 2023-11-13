<?php
require_once("DataAccess.php");
class ForoRepository extends DataAccess
{
	public function __construct()
    {
		$this-> AbrirConexion ();
	}		
    public function GetAll()
	{	
		try
		{					
			$this->consulta="SELECT * FROM foros";
			$result=$this->EjecutarConsulta($this->consulta);			
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result->fetchAll();		
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
			$this-> consulta="INSERT INTO foros(titulo, mensaje,fecha,usuario_id) values(:titulo,:mensaje,
			:fecha,:usuario)";	
			$params=[
				":mensaje"=>$request->mensaje,
				":fecha"=>$request->fecha,
				":usuario"=>$request->usuario_id
			];
			$result=$this->EjecutarConsulta($this->consulta,$params);
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
			$this->consulta="SELECT * FROM foros where id=:id";
			$params=[
				":id"=>$id
			];
			$result=$this->EjecutarConsulta($this->consulta,$params);		
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
			$params=[
				":titulo"=>$request->titulo,				
				":mensaje"=>$request->mensaje,
				":fecha"=>$request->fecha,
				":usuario"=>$request->usuario_id,														
				":id"=>$id
			];
			$this->consulta="UPDATE foros Set titulo=:titulo, mensaje=:mensaje,
							 fecha=:fecha,usuario_id =:usuario where id=:id";	
			$result=$this->EjecutarConsulta($this->consulta,$params);					
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
			$params=[
				":id"=>$id
			];
			$this->consulta="DELETE FROM foros WHERE id=:id";
			$result=$this->EjecutarConsulta($this->consulta,$params);				
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
}


