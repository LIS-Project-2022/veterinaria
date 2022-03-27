<?php
    require_once('../../app/models/tipo_usuario.class.php');

    try
    {
        $tipo_usuario = new TipoUsuario;
        if(!isset($_GET['id']))
        {
            Page::showMessage(2, 'Seleccione un usuario', 'index.php');
        }
        else if(!$tipo_usuario->setIdTipoUsuario($_GET['id']))
        {
            Page::showMessage(2, 'El id de usuario no es valido', 'index.php');
        }
        else if(!$tipo_usuario->getIdTipoUsuario())
        {
            Page::showMessage(2, 'El usuario no existe', 'index.php');
        }
        else
        {
            require_once('../../app/views/tipo_usuario/update.php');
            if(isset($_POST['modificar']))
            {
                $_POST = $tipo_usuario->validateForm($_POST);
            if(!$tipo_usuario->setIdTipoUsuario($_POST['id_tipo_usuario']))
            {
                throw new Exception('Ingrese el ID del tipo de usuario solo con numeros');
            }

            else if(!$tipo_usuario->setTipoUsuario($_POST['tipo_usuario']))
            {
                throw new Exception('Ingrese el tipo de usuario solo con letras');
            }

            else if(!$tipo_usuario->setEstado($_POST['estado']))
            {
                throw new Exception('Ingrese un un estado valido 1-activo 0-inactivo');
            }

                else
                {
                    if($tipo_usuario->update())
                    {
                        Page::showMessage(1, "Tipo de Usuario modificado", "index.php");
                    }
                    else
                    {
                        throw new Exception('Ocurrio un problema al momento de modificar al usuario');
                    }
                }
            }
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }

    
?>