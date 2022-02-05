<?php
class DataAccess
{
	private $con,$host,$user,$pwd,$db,$result;
	public function __construct()
	{
		$this->host='localhost';
		$this ->user="root";
		$this->pwd="";
		$this->db="foroweb";
	}
	private function CerrarConexion()
	{
		mysqli_free_result($this-> result);
		mysqli_close($this->con);
	}

	private function AbrirConexion()	
	{
		$this->con=mysqli_connect($this->host,$this->user,$this->pwd,$this->db) or die ($this-> mensaje(mysqli_error($this->con)));
	}
	public function mensaje($msg)
	{
		$style="    margin: 0 auto;  
		width: 50%;
	  background-color: red;
	  text-align: center;
	  color:white;
	  text-align: center;
	  font-weight: bold;
	  font-size: 20px;
	  padding: 20px;";
	  return "<div style='$style'>$msg</div>";

	}
	public function Login($usuario,$pwd)
	{  			
		$this->AbrirConexion();
		$consulta="call login('$usuario','$pwd')";		
		$this->result=mysqli_query($this->con,$consulta) or die ( $this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this->result);		
		$id=0;
		if( $num!=0)
		{					
			while ($fila =mysqli_fetch_array($this->result, MYSQLI_ASSOC))
			{
                $id= $fila["id"];			
			}			
		}
		$this->CerrarConexion();
		return $id;
	}
	public function insertarpermiso($idperfil,$modulo,$value)
	{
		$this->AbrirConexion();
		$consulta="call insertarpermiso($idperfil,$modulo,'$value')";
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
	public function eliminarPerfil($id)
	{
		$this->AbrirConexion();
		$consulta="delete from perfil where id=$id";
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
	public function buscarpermiso($idperfil,$modulo,$value)
	{
		$this->AbrirConexion();
		$consulta="call buscarpermiso($idperfil,$modulo,'$value')";
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$encontrado=false;
		if($num!=0)
		{
			$encontrado=true;
		}
		$this->CerrarConexion();
		return $encontrado;

	}
	public function EliminarPermiso($id)
	{
		$this->AbrirConexion();
		$consulta="delete from permisos where id=$id";
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
	public function llenarCombo($tabla)
	{  		
		$this->AbrirConexion();
		$consulta="select id,Nombre from $tabla";
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$arr;
		if($num!=0)
		{
			$i=0;
			while ($fila =mysqli_fetch_array($this->result, MYSQLI_ASSOC))
			{
				$arr[$i] = array("id"=>$fila["id"], "nombre"=>$fila["Nombre"]);
				$i++;
			}
		}
		$this->CerrarConexion();
		return $arr;				
	}
	public function PasswordChange($id,$newPassword)
	{
		$this->AbrirConexion();
		$consulta="call PasswordChange($id,'$newPassword')";
		$this->result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
	public function mostroarPermisosPerfil($idperfil)
	{
		$this->AbrirConexion();
		$consulta="call mostroarPermisosPerfil($idperfil)";	
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$arr=NULL;
		if($num!=0)
		{
			$i=0;
			while ($fila =mysqli_fetch_array($this->result, MYSQLI_ASSOC))
			{
				$arr[$i] = array("id"=>$fila["Id"], "modulo"=>$fila["modulo"], "valor"=>$fila["valor"] );
				$i++;
			}
		}
		$this->CerrarConexion();
		return $arr;				
	}
	public function BuscarUsuarios($id)
	{		
		$this->AbrirConexion();
		$consulta="call BuscarUsuario($id)";	
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$usuario =NULL;
		if( $num!=0)
		{
			$usuario=new Usuarios();			
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
                $usuario->id=$fila["Id"];
				$usuario->identificacion=$fila["Identificacion"];
				$usuario->prinombre=$fila["PrimerNombre"];
				$usuario->segnombre=$fila["SegundoNombre"];
				$usuario->priapellido=$fila["PrimerApellido"];
				$usuario->segapellido=$fila["SegundoApellido"];
				$usuario->Direccion=$fila["Direccion"];
				$usuario->telefono=$fila["Telefono"];  
				$usuario->Email=$fila["Email"];
				$usuario->Usuario=$fila["Usuario"];
				$usuario->pwd=$fila["pwd"];				
				$usuario->idperfil=$fila["IdPerfil"];   
			}
		}
		$this->CerrarConexion();	
		return $usuario;
	}
	public function BuscarPerfil($id)
	{
		$this->AbrirConexion();
		$consulta="call BuscarPerfil($id)" ;
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$perfil =NULL;
		if( $num!=0)
		{
			$perfil=new Perfil();
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
                $perfil->id=$fila["Id"];
				$perfil->nombre=$fila["Nombre"];
				$perfil->descripcion=$fila["Descripcion"];
				$perfil->estado=$fila["estado"];
			}			
		}
		$this->CerrarConexion();
		return $perfil;
	}
	public function BuscarPerfilNombre($nombre)
	{
		$this->AbrirConexion();
		$consulta="SELECT * from perfil WHERE nombre='$nombre'" ;
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$perfil =NULL;
		if( $num!=0)
		{
			$perfil=new Perfil();
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
                $perfil->id=$fila["Id"];
				$perfil->nombre=$fila["Nombre"];
				$perfil->descripcion=$fila["Descripcion"];
				$perfil->estado=$fila["estado"];
			}			
		}
		$this->CerrarConexion();
		return $perfil;
	}

	public function BuscarModulosNombre($nombre)
	{
		$this->AbrirConexion();
		$consulta="SELECT * from modulos WHERE nombre='$nombre'" ;
		$this-> result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$num =mysqli_num_rows($this-> result);
		$modulos =NULL;
		if( $num!=0)
		{
			$modulos=new Modulos();
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
                $modulos->id=$fila["Id"];
				$modulos->nombre=$fila["Nombre"];
				$modulos->descripcion=$fila["Descripcion"];				
			}			
		}
		$this->CerrarConexion();
		return $modulos;
	}

	public function EditarUsuarios($id, $identificacion, $prinombre ,$segnombre,$priapellido,$segapellido,
		$Direccion, $telefono,$idperfil)
	{
		$this->AbrirConexion();
		$consulta="call EditarUsuario(".$id.",'".$identificacion."','".$prinombre."','".$segnombre.
		"','".$priapellido."','".$segapellido."','".$Direccion."','".$telefono."',".$idperfil.")";
		$this->result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
	public function MostrarPerfiles()
	{
		$this->AbrirConexion();
		$consulta="select * FROM viewperfiles";
		$this->result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$arr;
		$num =mysqli_num_rows($this-> result);
		if($num!=0)
		{
			$i=0;
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
				$arr[$i] = array("id"=>$fila["id"], "nombre"=>$fila["nombre"],
				"descripcion"=>$fila["descripcion"],"estado"=>$fila["estado"]);
				$i++;
			}
		}
		$this->CerrarConexion();
		return $arr;				
	}
	public function MostrarModulos()
	{
		$this->AbrirConexion();
		$consulta="select * FROM Modulos";
		$this->result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$arr;
		$num =mysqli_num_rows($this-> result);
		if($num!=0)
		{
			$i=0;
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
				$arr[$i] = array("id"=>$fila["id"], "nombre"=>$fila["Nombre"],
				"descripcion"=>$fila["Descripcion"]);
				$i++;
			}
		}
		$this->CerrarConexion();
		return $arr;				
	}
	public function MostrarUusuarios()
	{
		$this->AbrirConexion ();
		$consulta="select * FROM viewusuarios";
		$this->result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		$arr;
		$num =mysqli_num_rows($this-> result);
		if($num!=0)
		{
			$i=0;
			while ($fila =mysqli_fetch_array($this-> result, MYSQLI_ASSOC))
			{
				$arr[$i] = array("id"=>$fila["Id"], "identificacion"=>$fila["Identificacion"],
				"NombreCompleto"=>$fila["NombreCompleto"],"Direccion"=>$fila["Direccion"],
				"telefono"=>$fila["Telefono"],"Email"=>$fila["Email"] ,"Usuario"=> $fila["Usuario"],
				"Perfil"=>$fila["Perfil"]);
				$i++;									  
			}
		}
		$this->CerrarConexion();
		return $arr;				
	}
	public function InsertarPerfiles($nombre,$descripcion)
	{
		$this->AbrirConexion();	
		$consulta="call InsertarPerfil('".$nombre."','".$descripcion."')";
		$this->	result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);

	}
	public function InsertarUsuarios($identificacion, $prinombre ,$segnombre,$priapellido,$segapellido, 
	$Direccion, $telefono,$Email,$Usuario,$pwd,$idperfil)
	{	
		$this->AbrirConexion();	
		$consulta="call InsertarUsuario('".$identificacion."','".$prinombre."','".$segnombre."','".
		$priapellido."','".$segapellido."','".$Direccion."','".$telefono."','".$Email."','".$Usuario.
		"','".$pwd."',".$idperfil.")";
		$this->	result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	
	}
	public function EliminarUsuarios($id)
	{
		$this->AbrirConexion();
		$consulta ="delete from usuario where Id=$id";		
		$result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}	
	public function insertarModulo($nombre, $descripcion)
	{
		$this->AbrirConexion();
		$consulta ="call insertarModulo('$nombre','$descripcion')";
		$result=mysqli_query($this->con,$consulta) or die ($this-> mensaje(mysqli_error($this->con)));
		mysqli_close($this->con);
	}
}
?>