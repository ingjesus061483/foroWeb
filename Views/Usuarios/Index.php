<?php
$titulo="Listado de usuarios";
require_once("../../shared/head.php");
$modulo="Usuarios";
$UsuarioController=new UsuarioController();
$rows=$UsuarioController->index();
$msg="";
if(isset( $_POST["eliminar"]))
{
   $UsuarioController->delete($_POST["id"],$msg); 
}
?>
<div style='margin:0 auto;' class='card'>
	<div class='header'>
		<a  class='btn btn-primary' href='Crear.php'>Crear</a>		
	</div>	
	<div class='body'>   
		<table class="table" id='customers'>
			<thead>
				<tr>
					<th >Id </th>											
					<th >Identificacion</th>								
					<th >Nombre completo</th>			
					<th >Direccion</th>											
					<th >Telefono</th> 											
					<th >Email</th>											
					<th>Usuario</th>										
					<th >perfil</th>
					<th></th>
					<th></th>					
				</tr>				
			</thead> 				
			<tbody>				
			<?php foreach($rows as $row){ ?>				
				<tr>
					<td><?=$row->id?></td>					
					<td><?=$row->identificacion?></td>					
					<td><?=$row->NombreCompleto?></td>					
					<td><?=$row->direccion ?></td>					
					<td><?=$row->telefono?></td>					
					<td><?=$row->email?></td>					
					<td><?=$row->usuario?></td>					
					<td><?=$row->perfil?></td>					
					<td><a class="btn  btn-warning" href="<?=$url?>views/usuarios/editar.php?id=<?=$row->id?>">Editar</a></td>					
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
<?php
require_once("../../shared/foot.php");
