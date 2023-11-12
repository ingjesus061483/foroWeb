
<?php
$titulo="Crear perfiles";
include("../../shared/head.php");

$modulo="Perfiles";
$msg="";
$PerfilesController=new PerfilController();
if (isset($_POST["enviar"]))
{
    $request=(object)$_POST;     
    $PerfilesController->CrearPost($request,$msg);    
    header('Location:index.php');
}    

?>    
<div style='margin:0 auto;' class='card mb-4'>
    <div class='card-body'>      
        <form id ='frm' action='Crear.php' onsubmit ='return validacion();'method='post'> 
            <div class="mb-3">
                <label for='Nombre'>Nombre</label>
                <input class="form-control" placeholder='nombre perfil..' type='text' id='nombre' name ='nombre' />			
            </div>
            <div class="mb-3">
                <label for='Descripcion'>Descripcion</label>
                <textarea type='text' class="form-control"  id='Descripcion' name ='descripcion' ></textarea>			            
            </div>
            <br>
            <a class='btn btn-primary' href ='index.php' >Regresar</a>
            <button class='btn btn-success' id='btnenviar' name='enviar' type='submit'>Enviar</button>		
            
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
<?php  include("../../shared/foot.php")?>


