<?php
$titulo="Crear cursos";
include("../../shared/head.php");

//$curso="cursos";
$msg="";
$cursoController=new cursoController();
if (isset($_POST["enviar"]))
{   
    $request=(object)$_POST;            
    $cursoController->update($request,$msg);
    header('Location:index.php');
}
if(isset($_GET["id"]))
{
    $id=$_GET["id"];      
}

$curso= $cursoController->editar($id);
?>
<div style='margin:0 auto;' class='card mb-4'>
    <div class='card-body'>  
        <form id ='frm' action='editar.php' onsubmit ='return validacion();'method='post'> 
            <input type="hidden" name="id" value="<?=$curso->id?>">
            <div class="mb-3">
                <label for='Nombre'>Nombre</label>              
                <input placeholder='nombre curso..' type='text' id='nombre' class="form-control" name ='nombre' 
                value="<?=$curso->nombre?>" />			
            </div>
            <div class="mb-3">
                <label for='Descripcion'>Descripcion</label>
                <textarea type='text' class="form-control" id='Descripcion' name ='descripcion' >
                    <?=$curso->descripcion?>
                </textarea>			                
            </div>
            <br>
            <a class='btn btn-primary' href ='index.php' >Regresar</a>                        
            <button class='btn btn-success '  id='btnenviar' name='enviar' type='submit'>Enviar</button>		                
        </form>						        	
    </div> 
</div>
<script type="text/javascript">
msg=document.getElementById('msg');
frm=document.getElementById('frm');
nombre=document.getElementById('nombre');
function validacion()
{
    if(nombre.value=="")    
    {        
        alertify.error("Campo invalido");        
        return false;    
    }    
    frm.submit();
}
</script>
<?php include("../../shared/foot.php");?>