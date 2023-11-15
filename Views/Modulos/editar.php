<?php
$titulo="Crear modulos";
include("../../shared/head.php");

//$modulo="Modulos";
$msg="";
$ModuloController=new ModuloController();
if (isset($_POST["enviar"]))
{   
    $request=(object)$_POST;            
    $ModuloController->update($request,$msg);
    header('Location:index.php');
}
if(isset($_GET["id"]))
{
    $id=$_GET["id"];      
}

$modulo= $ModuloController->editar($id);
?>
<div style='margin:0 auto;' class='card mb-4'>
    <div class='card-body'>  
        <form id ='frm' action='editar.php' onsubmit ='return validacion();'method='post'> 
            <input type="hidden" name="id" value="<?=$modulo->id?>">
            <div class="mb-3">
                <label for='Nombre'>Nombre</label>              
                <input placeholder='nombre modulo..' type='text' id='nombre' class="form-control" name ='nombre' 
                value="<?=$modulo->nombre?>" />			
            </div>
            <div class="mb-3">
                <label for='Descripcion'>Descripcion</label>
                <textarea type='text' class="form-control" id='Descripcion' name ='descripcion' >
                    <?=$modulo->descripcion?>
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
    return true;
}
</script>
<?php include("../../shared/foot.php");?>