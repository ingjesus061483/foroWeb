<?php
$titulo="Listado de perfiles";
include("../../shared/head.php");
$modulo="Perfiles";
$PerfilesController=new PerfilController();
$msg="";
if(isset( $_POST["eliminar"]))
{
   $PerfilesController->delete($_POST["id"],$msg); 
}
$rows=$PerfilesController->index();

?>
<div style='margin:0 auto;' class='card'>
   <div class='header'>  
      <a class='btn btn-primary' href='Crear.php'>Crear</a>
   </div>
   <div class='body'>   
      <table class="table" id='customers'>
      <thead>         
         <tr>            
            <th >Id </th>
            <th >Nombre</th>
            <th >Descripcion</th>                                       
            <th></th>                    
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
            <td><a class="btn btn-success" href="<?=$url?>views/perfiles/Detalles.php?id=<?=$row->id?>">Ver</a></td>    
            <td><a class="btn  btn-warning" href="<?=$url?>views/perfiles/editar.php?id=<?=$row->id?>">Editar</a></td>    
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

