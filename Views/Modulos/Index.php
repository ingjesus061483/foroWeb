<?php
$titulo="Listado de  modulos";
$modulo="Modulos";
session_start();
if (!isset($_SESSION['usuario']))
{
  header('Location:../../login.php');
}
$id=$_SESSION['usuario'];
require_once("../../Model/Usuarios.php");
require_once("../../Model/Perfil.php");
require_once("../../Data/DataAccess.php");
require_once("../../Data/Utilidades.php");
require_once("../../Controllers/ModulosController.php");
$ModulosController=new ModulosController();
$table=$ModulosController->index();
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
                <th >Nombre</th>
                <th >Descripcion</th>                                         
                <th></th>                          
                </tr>
            </thead>       
            <tbody>
                $table
            </tbody>
        </table>
    </div>
</div>";
require_once("../../shared/Plantilla.php");
?>
