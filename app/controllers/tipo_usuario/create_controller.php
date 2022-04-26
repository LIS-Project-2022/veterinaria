<?php
    require_once('../../app/models/tipo_usuario.class.php');
    require_once('../../app/middleware/auth.class.php');
    try
    {
        //Verifica si es administrador
        Auth::checkAdmin();

        $tipo_usuario = new TipoUsuario;
        
        if(isset($_POST['agregar']))
        {
            $_POST = $tipo_usuario->validateForm($_POST);

            if(!$tipo_usuario->setTipoUsuario($_POST['tipo_usuario']))
            {
                throw new Exception('Ingrese el tipo de usuario solo con letras');
            }
            else
            {
                if($tipo_usuario->create())
                {
                    Page::showMessage(1, "Tipo de Usuario creado", "index.php");
                }
                else
                {
                    throw new Exception('Ocurrio un problema al momento de crear el tipo de usuario');
                }
            }
            
            
        }
    }
    catch (Exception $error) {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/tipo_usuario/create.php');
?>