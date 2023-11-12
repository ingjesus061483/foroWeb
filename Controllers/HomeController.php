<?php
class HomeController
{
    public function index()
    {
        $usuario=unserialize($_SESSION['usuario']);
        return $usuario;
    }
}