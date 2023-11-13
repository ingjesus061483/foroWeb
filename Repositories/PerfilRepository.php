<?php
require_once("DataAccess.php");
//require_once("../Model/Perfil.php");
//require_once("PermisoRepository.php");
class PerfilRepository extends DataAccess{

   
    public function __construct()
    {
        $this->AbrirConexion();
       
    }
    public function GetAll()
    {
        try
        {
           $this->consulta = "SELECT * FROM perfiles";           
           $result=$this->EjecutarConsulta($this->consulta);
           // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:           
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
            $this->consulta ="SELECT * FROM perfiles where id=:id";
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
            $this->consulta ="INSERT INTO perfiles (nombre, descripcion) VALUES
                                        (:nombre, :descripcion)";
            // Bind
            $nombre = $request->nombre;
            $descripcion = $request->descripcion;
            $params=[':nombre'=> $nombre,'descripcion'=> $descripcion];            
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
         
            $this->consulta ="UPDATE perfiles SET nombre=:nombre, 
                              descripcion=:descripcion WHERE id=:id";                       
            // Bind            
            $params=[
                    ":id"=>$id,
                     ':nombre'=> $request->nombre,
                     ':descripcion'=> $request->descripcion
                    ];            
            // Excecute
            $this->EjecutarConsulta($this->consulta,$params);
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        }        
    }
    public function delete($id)
    {
        try
        {         
            $this->consulta="DELETE FROM perfiles where id=:id";
            $params=[":id"=>$id];
            $this->EjecutarConsulta($this->consulta,$params);       
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        }       
    }
}