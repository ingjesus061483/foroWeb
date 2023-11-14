<?php
class CursoController
{
    private  CursoRepository $cursoRepository;
    public function __construct() {
        $this->cursoRepository =new CursoRepository();
    }
    private function GetCurso($result)
    {
        $curso=null;
        while($row=$result->fetch()){
           $curso=new Curso();
           $curso->id=$row->id;
           $curso->nombre=$row->nombre;
           $curso->descripcion=$row->descripcion;           
        }
        return $curso;
    }
    public function index()
    {
        $result=$this->cursoRepository->GetAll();              
        return $result;
    }
    public function store($request,&$msg)
    {
        $msg="";        
        $this->cursoRepository-> store($request);        
        $msg="Registro insertado con exito ";
    }
    public function editar($id){
        $result=$this->cursoRepository->find($id);     
        $curso=$this->GetCurso($result);    
        return $curso;
    }
    public function update($request,&$msg)
    {       
        $this->cursoRepository->update($request->id, $request);        
        $msg="Registro actualizado con exito ";
        
    }
    public function delete($id,&$msg)
    {        
        $this->cursoRepository-> delete($id);        
        $msg="El registro se ha eliminado correctamente";        
    }


}
