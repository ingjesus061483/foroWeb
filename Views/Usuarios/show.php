<?php
$titulo="Detalle de usuario";
include("../../shared/head.php");

$modulo="useres";
$usuarioController=new UsuarioController();
$id=0;
$msg="";
if (isset($_GET["id"]))
{    
    $id=$_GET['id'];    
}
if (isset($_POST["eliminar"]))
{
    $request =(object) $_POST;
    $usuarioController->DeleteCursosByUsuarios($request);
    header('Location:index.php');	    
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
                </tr>
            </thead>       
            <tbody>
            <?php foreach($cursos as $row){ ?>
            <tr>
               <td ><?=$row->id?> </td>
               <td><?=$row->nombre?></td>            
               <td><?=$row->descripcion?></td>                                                         
               <td>
                  <form action="show.php" onsubmit="return Confirmar('Desea eliminar este restro?')" method="post">
                     <input type="hidden" name="usuario_id" value="<?=$user->id?>">
                     <input type="hidden" name="curso_id" value="<?=$row->id?>">
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