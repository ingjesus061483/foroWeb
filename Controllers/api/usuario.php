<?php
require_once("../../Model/Usuario.php");
require_once("../../Model/Perfil.php");
require_once('../../Repositories/PerfilRepository.php');
require_once('../../Repositories/CursoRepository.php');
require_once('../../Repositories/UsuarioRepository.php');
require_once('../UsuarioController.php');
$request =(object)$_POST;
$usuarioRepository=new UsuarioRepository();
$usuariocontroller=new UsuarioController();
switch($request->opcion){
    case 1:{
        $row =$usuarioRepository->Find($request->id);
        $usuario=$usuariocontroller->GetUser($row);
        echo json_encode(array("usuario"=>$usuario));
        break;
    }
    case 2:{
        $error=$usuarioRepository->BuscarCursosByUsuarios($request-> usuario_id, $request-> curso_id);
        if(!$error)        
        {
            $usuarioRepository->PostCursosByUsuarios($request);            
            echo json_encode(array("msg"=>"El registro se ha guardado correctamente","err"=>!$error));
        }
        else
        {
            echo json_encode(array("msg"=>"EL curso ya se encuentra registrado","err"=>!$error));
        }
    }
}
