<?php
require_once("DataAccess.php");
class PermisoRepository extends DataAccess
{
    public function __construct() {

        $this->AbrirConexion();
    }
    public function buscarpermiso($perfil_id,$modulo_id,$value){
        try{
            $encontrado=false;
            $stmt=$this->con->prepare("SELECT * FROM permisos WHERE 
                                   perfil_id=:perfil AND modulo_id=:modulo AND valor =:valor");
            $stmt->bindParam(':perfil',$perfil_id);
            $stmt->bindParam(':modulo',$modulo_id);
            $stmt->bindParam(':valor',$value);
            $stmt->execute();                              
            $stmt->setFetchMode(PDO::FETCH_OBJ);           
            while($row=$stmt->fetch()){
                $encontrado=true;
            }
            return $encontrado;

        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        
        }                            
    }
    public function getPermisosByPerfil($perfil_id) 
    {
        try{
            $stmt = $this->con->prepare("SELECT permisos.id,modulos.nombre modulo,permisos.valor ,
                                         permisos.perfil_id,modulos.id modulo_id FROM permisos 
                                         JOIN modulos ON  modulos.id =permisos.modulo_id WHERE
                                         perfil_id=:perfil");  
            $stmt->bindParam(":perfil",$perfil_id);                            
            $stmt->execute();                              
            $stmt->setFetchMode(PDO::FETCH_OBJ);           
            return $stmt;        
        }
        catch(Exception $ex)
        {
            die($ex->getMessage());
        
        }                            
        
    }

    public function GetAll()
    {
        try
        {
            $stmt = $this->con->prepare("SELECT * FROM permisos");              
            $stmt->execute();                              
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
        
    }
    public function Store($request)
    {
        try
		{	
			$result=$this->con->prepare("INSERT into permisos(valor,perfil_id,modulo_id )values
                                        (:valor,:perfil,:modulo )");
			$result->bindParam(":valor",$request->valor);
			$result->bindParam(":perfil",$request->perfil);
			$result->bindParam(":modulo",$request->modulo );
			$result->execute();					
     	}
		catch(Exception $ex){
			die($ex->getMessage());
		}		 
    }
    public function Update($id, $request)
    {
        
    }
    public function delete($id)
    {
        try
		{	
			$result=$this->con->prepare("DELETE FROM permisos where id=:id");
			$result->bindParam(":id",$id);
			$result->execute();					
     	}
		catch(Exception $ex){
			die($ex->getMessage());
		}		 
        
    }


}
