<?php
    require_once('../../models/database.class.php');
    require_once('../../helpers/validator.class.php');
    require_once('../../models/usuario.class.php');

    try
    {
        session_start();
        $usuario = new Usuario;
        $body = file_get_contents('php://input'); //Se obtiene los valores enviados por fetch 
        $data = json_decode($body); //Se convierte a un array
        if(!$usuario->setCorreo($data->email))
        {
            throw new Exception('El correo es invalido');
        }
        if(!$usuario->checkEmail())
        {
            throw new Exception('No se ha registrado un usuario con ese correo electrónico');
        }
        $infoAuth = $usuario->getInfoSession();
        if($infoAuth['estado'] == 1)
        {
            $_SESSION['auth'] = $infoAuth;
            echo json_encode([
                "location" => "../../dashboard/home"
            ]);
        }
        else
        {
            throw new Exception('Su usuario esta desactivado, por favor contactar con el administrador');
        }

    } 
    catch (Exception $error)
    {
        echo json_encode(["error" => $error->getMessage()]);
    }
?>