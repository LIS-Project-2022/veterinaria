<?php
    require_once('../../app/models/usuario.class.php');
    try
    {
        $usuario = new Usuario;
        // util solo mientras no esta la autenticación
        session_start();
        $_SESSION["idUser"] = '1';
        $idUser = $_SESSION['idUser'];
        if($idUser != ''){
            $tiposUsuario = $usuario->getTiposUsuario();
            if(!$usuario->setIdUsuario($idUser))
            {
                Page::showMessage(2, 'El id de usuario no es valido', 'update.php');
            }
            if(!$usuario->getUsuarioForId())
            {
                Page::showMessage(2, 'El usuario no existe', 'update.php');
            }
            require_once('../../app/views/perfil/update_password.php');
            if(isset($_POST['update_password'])){
                if(!$usuario->setPassword($_POST['password_old'])){
                    return Page::showMessage(2, 'Escribe una contraseña valida (Alfanumerica)', 'update.php');
                }
                if($_POST['password_new1'] != $_POST['password_new2']){
                    return Page::showMessage(2, 'No coinciden las nuevas contraseñas', 'update.php');
                }
                if(!$usuario->setNewPassword($_POST['password_new1'])){
                    return Page::showMessage(2, 'Escribe una contraseña valida en contraseña nueva (Alfanumerica)', 'update.php');
                }
                if(!$usuario->setIdUsuario($idUser))
                {
                    return Page::showMessage(2, 'El id de usuario no es valido', 'update.php');
                }
                if($usuario->changePassword())
                {
                    Page::showMessage(1, "Contraseña actualizada", "update.php");
                }
                else
                {
                    throw new Exception('Ocurrio un problema al momento de actualizar la contraseña');
                }
            }
        }else{
            echo("<h1 class='text-center'>El usuario no esta autenticado no puede ver el perfil<h1>");
        }
        
    }
    catch(Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), "");
    }
    
?>