<?php
require_once("DataAccess.php");
class ModuloRepository extends DataAccess
{
    public function __construct()
    {
        $this->AbrirConexion();        
    }
    public function GetAll()
    {
        try
        {
           $stmt = $this->con->prepare("SELECT * FROM modulos");
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
            $stmt = $this->con->prepare("SELECT * FROM modulos where id=:id");
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
            $stmt = $this->con->prepare("INSERT INTO modulos (nombre, descripcion) VALUES
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
            $stmt = $this->con->prepare("UPDATE modulos SET nombre=:nombre, 
                                                            descripcion=:descripcion 
                                                            WHERE id=:id");
            // Bind
            $stmt->bindParam(":id",$request->id);
            $stmt->bindParam(':nombre', $request->nombre);
            $stmt->bindParam(':descripcion',$request->descripcion);            
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
            $stmt=$this->con->prepare("DELETE FROM modulos where id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();       
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());

        }    
    }
}