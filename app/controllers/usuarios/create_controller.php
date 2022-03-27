<?php
    require_once('../../app/models/usuario.class.php');

    try
    {
        $usuario = new Usuario;
        $tiposUsuario = $usuario->getTiposUsuario();

        if(isset($_POST['agregar']))
        {
            $_POST = $usuario->validateForm($_POST);
            if(!$usuario->setNombres($_POST['nombres']))
            {
                throw new Exception('Ingrese sus nombres solo con letras');
            }

            else if(!$usuario->setApellidos($_POST['apellidos']))
            {
                throw new Exception('Ingrese sus apellidos solo con letras');
            }

            else if(!$usuario->setCorreo($_POST['correo']))
            {
                throw new Exception('Ingrese un correo electrónico valido');
            }

            else if(!$usuario->setTelefono($_POST['telefono']))
            {
                throw new Exception('Ingrese 8 números en el número de teléfono');
            }

            else if(!$usuario->setUsuario($_POST['usuario']))
            {
                throw new Exception('Ingrese un usuario');
            }

            else if(!$usuario->setPassword($_POST['password']))
            {
                throw new Exception('Ingrese una contraseña');
            }

            else if($_POST['password'] !== $_POST['password_confirm'])
            {
                $_POST['password_confirm'] = '';
                throw new Exception('Las contraseñas no son iguales');
            }

            else if(!isset($_POST['tipo_usuario']) || !$usuario->setIdTipoUsuario($_POST['tipo_usuario']))
            {
                $_POST['tipo_usuario'] = '';
                throw new Exception('Seleccione el tipo de usuario');
            }
            else
            {
                if($usuario->create())
                {
                    Page::showMessage(1, "Usuario creado", "index.php");
                }
                else
                {
                    throw new Exception('Ocurrio un problema al momento de crear al usuario');
                }
            }
            
            
        }
    }
    catch (Exception $error) {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/usuarios/create.php');
?>