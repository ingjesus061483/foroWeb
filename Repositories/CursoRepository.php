<?php
require_once("DataAccess.php");
class CursoRepository extends DataAccess
{
   public function __construct()
   {
    $this->AbrirConexion();
   } 
   public function GetAll()
   {
        try
        {
            $this->consulta="SELECT * from cursos";
            $result=$this->EjecutarConsulta($this->consulta);			
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result->fetchAll();		        
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
            $this->consulta ="SELECT * FROM cursos where id=:id";
            $params=[":id"=>$id];
            // Ejecutamos
            $result=$this->EjecutarConsulta($this->consulta,$params);
                // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
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
            $this->consulta = "INSERT INTO cursos (nombre, descripcion) VALUES
                                        (:nombre, :descripcion)";
            // Bind
            $nombre = $request->nombre;
            $descripcion = $request->descripcion;
            $params=[':nombre'=> $nombre,':descripcion'=> $descripcion];            
            // Excecute
            $this->EjecutarConsulta($this->consulta,$params);

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
            $this->consulta ="UPDATE cursos SET nombre=:nombre,descripcion=:descripcion 
            WHERE id=:id";
            // Bind
            $params=[":id"=>$request->id,
                   ":nombre"=> $request->nombre,
                   ":descripcion"=>$request->descripcion];            
            // Excecute
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
            $this->consulta="DELETE FROM cursos where id=:id";
            $params=[":id"=>$id];
            $this->EjecutarConsulta($this->consulta,$params);                       
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        }    
   }
}