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
            $this->consulta="SELECT * FROM permisos WHERE perfil_id=:perfil 
                             AND modulo_id=:modulo AND valor =:valor";
            $params=[':perfil'=>$perfil_id,':modulo'=>$modulo_id,':valor'=>$value];
            $result=$this->EjecutarConsulta($this->consulta,$params);                              
            $result->setFetchMode(PDO::FETCH_OBJ);           
            if($row=$result->fetch()){
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
            $this->consulta = "SELECT permisos.id,modulos.nombre modulo,permisos.valor ,
                               permisos.perfil_id,modulos.id modulo_id FROM permisos JOIN modulos 
                               ON  modulos.id =permisos.modulo_id WHERE perfil_id=:perfil";  
            $params=[":perfil"=>$perfil_id];                            
            $result=$this->EjecutarConsulta($this->consulta,$params);                              
            $result->setFetchMode(PDO::FETCH_OBJ);           
            return $result->fetchAll();        
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
            $this->consulta ="SELECT * FROM permisos";              
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
        
    }
    public function Store($request)
    {
        try
		{	
			$this->consulta="INSERT into permisos(valor,perfil_id,modulo_id )values
                                        (:valor,:perfil,:modulo )";
			$params=[":valor"=>$request->valor,":perfil"=>$request->perfil,":modulo"=>$request->modulo ];
			$this->EjecutarConsulta($this->consulta,$params);					
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
			$this->consulta="DELETE FROM permisos where id=:id";
			$params=[":id"=>$id];
			$this->EjecutarConsulta($this->consulta,$params);					
     	}
		catch(Exception $ex){
			die($ex->getMessage());
		}		 
        
    }


}
