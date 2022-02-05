
<?php
class HomeController
{
    public function index(&$usuario)
    {
        $usuario=unserialize($_SESSION['usuario']);
    }
}