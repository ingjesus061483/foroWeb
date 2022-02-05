<?php
session_start();
$titulo="Listado de usuarios";
$modulo="Usuarios";
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/UsuariosController.php");
if (!isset($_SESSION['usuario']))
{
  header('Location:../../login.php');
}
$UsuarioController=new UsuariosController();
$table=$UsuarioController->index();
$body="
<div style='margin:0 auto;' class='card'>
				<div class='header'>
					$titulo
				</div>
				<div class='body'>   
					<div>
						<a style='float :right;' class='button' href='Crear.php'>Crear</a>
					</div>
					<div>
						<table id='customers'>
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
								</tr>
							</thead> 
							<tbody>
								 $table
							</tbody>
						</table>
					<d/iv>
				</div>
			</div>

";
require_once("../../shared/Plantilla.php");
?>

			
	

