<?php
$titulo="Listado de  cursos";
include("../../shared/head.php");

$curso="cursos";
$cursosController=new cursoController();
$rows=$cursosController->index();
if(isset( $_POST["eliminar"]))
{
   $cursosController->delete($_POST["id"],$msg); 
}

?>

<div style='margin:0 auto;' class='card mb-4'>
    <div class='card-header'>
        <a  class='btn btn-primary' href='Crear.php'>Crear</a>
    </div>
    <div class='card-body'>   
        <table class="table" id='customers'>
            <thead>
                <tr>
                    <th >Id </th>
                    <th >Nombre</th>
                    <th >Descripcion</th>                                         
                    <th></th>  
                    <th></th>                          
                </tr>
            </thead>       
            <tbody>
            <?php foreach($rows as $row){ ?>
            <tr>
               <td ><?=$row->id?> </td>
               <td><?=$row->nombre?></td>            
               <td><?=$row->descripcion?></td>                                          
               <td><a class="btn  btn-warning" href="<?=$url?>views/cursos/editar.php?id=<?=$row->id?>">Editar</a></td>    
               <td>
                  <form action="Index.php" method="post">
                     <input type="hidden" name="id" value="<?=$row->id?>">
                     <button type="submit" class="btn btn-danger" name="eliminar" >Eliminar</button>
                  </form>
               </td>
            </tr>
            <?php }?>      
            </tbody>
        </table>
    </div>
</div>
<?php include("../../shared/foot.php");?>