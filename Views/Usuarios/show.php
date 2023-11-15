<?php
$titulo="Detalle de usuario";
include("../../shared/head.php");

$modulo="useres";
$usuarioController=new usuarioController();
$id=0;
$msg="";
if (isset($_GET["id"]))
{    
    $id=$_GET['id'];    
}
$rows=null;
$user=$usuarioController->show($id,$rows);
$cursos=$user->Cursos;
?>
<div class='card'>    
    <div class='body'>
        <p><strong>indentificacion:</strong><?= $user->identificacion?> </p>        
        <p><strong>Nombre completo:</strong><?=$user->nombre.' '.$user->apellido ?></p>        
        <p><strong>Direccion:</strong> <?=$user->direccion?></p>        
        <p><strong>Telefono:</strong><?= $user->telefono?></p>        
        <p><strong>user:</strong><?= $user->usuario?></p>             
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
            <?php foreach($cursos as $row){ ?>
            <tr>
               <td ><?=$row->id?> </td>
               <td><?=$row->nombre?></td>            
               <td><?=$row->descripcion?></td>                                          
               <td><a class="btn  btn-warning" href="<?=$url?>views/cursos/editar.php?id=<?=$row->id?>">Editar</a></td>    
               <td>
                  <form action="show.php" method="post">
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
<?php require_once("../../shared/foot.php");?>