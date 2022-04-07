<?php
    require_once('../../app/models/tipo_usuario.class.php');

    try
    {
        $tipo_usuario = new TipoUsuario;
        
        if(isset($_POST['agregar']))
        {
            $_POST = $tipo_usuario->validateForm($_POST);
            // if(!$tipo_usuario->setIdTipoUsuario($_POST['id_tipo_usuario']))
            // {
            //     throw new Exception('Ingrese el ID del tipo de usuario solo con numeros');
            // }

            if(!$tipo_usuario->setTipoUsuario($_POST['tipo_usuario']))
            {
                throw new Exception('Ingrese el tipo de usuario solo con letras');
            }

            // else if(!$tipo_usuario->setEstado($_POST['estado']))
            // {
            //     throw new Exception('Ingrese un un estado valido 1-activo 0-inactivo');
            // }

          
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