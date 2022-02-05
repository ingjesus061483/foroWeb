<?php
$menu="";
$usuario=unserialize( $_SESSION["usuario"]);
$perfil=$usuario->Perfil;
switch($modulo)
{
    case "inicio":
    {        
        $permisos=$perfil->Permisos;
        $menu=Utilidades::CrearMenu($permisos,$modulo);
        break;        
    }
    case "Usuarios":
    {
        $permisos=$perfil->Permisos;
        $menu=Utilidades::CrearMenu($permisos,$modulo);
        break;            
    }
    case "Perfiles":
    {
        $permisos=$perfil->Permisos;
        $menu=Utilidades::CrearMenu($permisos,$modulo);
        break;        
    }
    case "Modulos":
    {
        $permisos=$perfil->Permisos;
        $menu=Utilidades::CrearMenu($permisos,$modulo);
        break;        
    }
}
?>