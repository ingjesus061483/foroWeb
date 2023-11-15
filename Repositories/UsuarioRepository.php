<?php
require_once("DataAccess.php");
class UsuarioRepository extends DataAccess
{	
	function __construct()
	{
		$this->AbrirConexion();	
	}
	function DeleteCursosByUsuarios($request)
	{
		try
		{
			$this->consulta ="DELETE from  usuario_cursos where usuario_id=:usuario_id and curso_id= :curso_id";
			$params=[":usuario_id"=>$request->usuario_id,":curso_id"=>$request->curso_id];			
			$this->EjecutarConsulta($this->consulta,$params);									
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
	function PostCursosByUsuarios($request)
	{
		try
		{
			$this->consulta="INSERT into usuario_cursos(usuario_id,curso_id) values (:usuario_id,:curso_id)   ";
			$params=[":usuario_id"=>$request->usuario_id,":curso_id"=>$request->curso_id];			
			$this->EjecutarConsulta($this->consulta,$params);									
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
	function BuscarCursosByUsuarios($usuario_id,$curso_id)
	{
		try
		{
			$encontrado=false;
			$this->consulta="SELECT cursos.* FROM cursos JOIN usuario_cursos ON cursos.id=usuario_cursos.curso_id 
							 WHERE  usuario_cursos.usuario_id=:usuario_id and curso_id=:curso_id ";
			$params=[":usuario_id"=>$usuario_id,":curso_id"=>$curso_id];
			$result=$this->EjecutarConsulta($this->consulta,$params);							
			$result->setFetchMode(PDO::FETCH_OBJ);
			$arr= $result->fetchAll();		
			if (count($arr)>0)
			{
				$encontrado=true;
			}
			return $encontrado;		
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
	function GetCursosByUsuarios($id)
	{
		try
		{
			$this->consulta="SELECT cursos.* FROM cursos JOIN usuario_cursos ON cursos.id=usuario_cursos.curso_id 
							 WHERE  usuario_cursos.usuario_id=:id";
			$params=[":id"=>$id];
			$result=$this->EjecutarConsulta($this->consulta,$params);							
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result->fetchAll();		
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
	function GetAll()
	{
		try
		{
			$this->consulta="SELECT  usuarios.id,usuarios.identificacion,concat( usuarios.nombre,' ',
							usuarios.apellido) NombreCompleto,usuarios.direccion,usuarios.telefono,usuarios.email,
							usuarios.usuario,usuarios.perfil_id, perfiles.nombre as perfil
			 				from usuarios join perfiles on usuarios.perfil_id=perfiles.id";
			$result=$this->EjecutarConsulta( $this->consulta);		
			$result->setFetchMode(PDO::FETCH_OBJ);			
			return $result->fetchAll();			
		}
		catch(Exception $ex){
			die($ex->getMessage());
		}	
	}
	function Store($request)
	{
		try
		{	
			$this->consulta="INSERT into usuarios(identificacion,nombre,apellido,direccion,
							telefono,email,usuario,password,perfil_id)values(:identificacion,
							:nombre,:apellido,:direccion,:telefono,:email,:usuario,:password,
							:perfil)";
			$params=[
				":identificacion"=>$request->identificacion,
				":nombre"=>$request->nombre,
				":apellido"=>$request->apellido,
				":direccion"=>$request->direccion,
				":telefono"=>$request->telefono,
				":email"=>$request->email,
				":usuario"=>$request->usuario,":password"=>md5( $request->password),				
				":perfil"=>$request->perfil
			];
			$this->EjecutarConsulta($this->consulta,$params);
     	}
		catch(Exception $ex){
			die($ex->getMessage());
		}		
	}	
	public function Find($id)
	{
		try
		{
			$this->consulta="SELECT id,identificacion,nombre,apellido,direccion,
							 telefono,email,usuario,perfil_id from usuarios where 
							 id=:id";										
			$params=[":id"=>$id];
			$result=$this->EjecutarConsulta($this->consulta,$params);							
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
			$this->consulta="UPDATE usuarios set nombre =:nombre, apellido=:apellido, direccion=:direccion,
										telefono=:telefono,perfil_id=:perfil where id=:id";
			$params=[						
				":nombre"=>$request->nombre,
				":apellido"=>$request->apellido,
				":direccion"=>$request->direccion,
				":telefono"=>$request->telefono,
				":perfil"=>$request->perfil,
				":id"=>$request->id
			];
			$this->EjecutarConsulta($this->consulta,$params);										
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
			$this->consulta="DELETE from usuarios where id=:id";		
			$params=[":id"=>$id];
			$this->EjecutarConsulta($this->consulta,$params);										
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
			$this->consulta="UPDATE usuarios set password =:password where id=:id";			
			$params=[
				":password"=>md5($request->password),				
				":id"=>$id
			];
			$this->EjecutarConsulta($this->consulta,$params);
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
			$this->consulta="SELECT id,identificacion,nombre,apellido,direccion,
								 	      telefono,email,usuario,perfil_id
									      from usuarios where email=:email and password=:password";												
			$params=[
				":email"=>$request->usuario,
				":password"=>$pwd
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
}
?> 