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
           $stmt = $this->con->prepare("SELECT * FROM perfiles");           
           // Ejecutamos           
           $stmt->execute();                      
           // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:           
           $stmt->setFetchMode(PDO::FETCH_OBJ);           
           return $stmt;        
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
            $stmt = $this->con->prepare("SELECT * FROM perfiles where id=:id");
            $stmt->bindParam(":id",$id);
            // Ejecutamos
            $stmt->execute();
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;        
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
            $stmt = $this->con->prepare("INSERT INTO perfiles (nombre, descripcion) VALUES
                                        (:nombre, :descripcion)");
            // Bind
            $nombre = $request->nombre;
            $descripcion = $request->descripcion;
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);            
            // Excecute
            $stmt->execute();
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
         
            $stmt = $this->con->prepare("UPDATE perfiles SET nombre=:nombre, 
                                                            descripcion=:descripcion 
                                                            WHERE id=:id");                       
            // Bind            
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(':nombre', $request->nombre);
            $stmt->bindParam(':descripcion', $request->descripcion);            
            // Excecute
            $stmt->execute();
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
            $stmt=$this->con->prepare("DELETE FROM perfiles where id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();       
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        }       
    }
}