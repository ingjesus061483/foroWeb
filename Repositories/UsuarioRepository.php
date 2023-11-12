<?php
//require("../vista/imagenes.php");
require_once("DataAccess.php");
//require_once("../Model/Usuario.php");
class UsuarioRepository extends DataAccess
{
	 private PerfilRepository $perfilRepository;
	function __construct()
	{
		$this->AbrirConexion();
		$this->perfilRepository=new PerfilRepository();
		
		
	}
	function GetAll()
	{
		try
		{
			$result=$this->con->prepare( "SELECT  usuarios.id,usuarios.identificacion,concat( usuarios.nombre,' ',
										usuarios.apellido) NombreCompleto,usuarios.direccion,usuarios.telefono,usuarios.email,
										usuarios.usuario,usuarios.perfil_id, perfiles.nombre as perfil
									 	from usuarios join perfiles on usuarios.perfil_id=perfiles.id");		
				   
			$result->execute();			
			$result->setFetchMode(PDO::FETCH_OBJ);			
			return $result;			
		}
		catch(Exception $ex){
			die($ex->getMessage());

		}	
	}
	function Store($request)
	{
		try
		{	
			$result=$this->con->prepare("INSERT into usuarios(identificacion,nombre,apellido,direccion,
										telefono,email,usuario,password,perfil_id)values(:identificacion,
										:nombre,:apellido,:direccion,:telefono,:email,:usuario,:password,
										:perfil)");
			$result->bindParam(":identificacion",$request->identificacion);
			$result->bindParam(":nombre",$request->nombre);
			$result->bindParam(":apellido",$request->apellido);
			$result->bindParam(":direccion",$request->direccion);
			$result->bindParam(":telefono",$request->telefono);
			$result->bindParam(":email",$request->email);
			$result->bindParam(":usuario",$request->usuario);
			$result->bindParam(":password",md5( $request->password));
			$result->bindParam(":perfil",$request->perfil);
			$result->execute();					
     	}
		catch(Exception $ex){
			die($ex->getMessage());
		}		
	}	
	public function Find($id)
	{
		try
		{
			$result= $this->con->prepare("SELECT id,identificacion,nombre,apellido,direccion,
								 	      telefono,email,usuario,perfil_id
									      from usuarios where id=:id");					
							
			$result->bindParam(":id",$id);
			$result->execute();							
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result;
		}
		catch(Exception $ex){
			die($ex->getMessage());
		}		
	}
	public function Update($id, $request)
	{
		try
		{
			$result=$this->con->prepare("UPDATE usuarios set nombre =:nombre, apellido=:apellido, direccion=:direccion,
										telefono=:telefono,perfil_id=:perfil where id=:id");
										
			$result->bindParam(":nombre",$request->nombre);
			$result->bindParam(":apellido",$request->apellido);
			$result->bindParam(":direccion",$request->direccion);
			$result->bindParam(":telefono",$request->telefono);			
			$result->bindParam(":perfil",$request->perfil);
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
			$result  = $this->con->prepare("DELETE from usuarios where id=:id");		
			$result->bindParam(":id",$id);
			$result->execute();	
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	}
	public function PasswordChange($id, $request)
	{
		try
		{
			$result=$this->con->prepare("UPDATE usuarios set password =:password where id=:id");			
			$result->bindParam(":password",md5($request->password));
			$result->bindParam(":id",$id);
			$result->execute();
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}		
	
	}
	public function Login($request)
	{		
		try
		{
			$pwd=md5($request->password);
			$result= $this->con->prepare("SELECT id,identificacion,nombre,apellido,direccion,
								 	      telefono,email,usuario,perfil_id
									      from usuarios where email=:email and password=:password");												
			$result->bindParam(":email",$request->usuario);
			$result->bindParam(":password",$pwd);
			$result->execute();				
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result;
		}
		catch(Exception $ex){
			die($ex->getMessage());
		}		
	}
	
	
}
?> 