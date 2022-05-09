<?php
    require_once('../../app/models/usuario.class.php');
    try
    {
        $usuario = new Usuario;
        $idUser = $_SESSION['auth']['id_usuario'];
        if($idUser != ''){
            $tiposUsuario = $usuario->getTiposUsuario();
            if(!$usuario->setIdUsuario($idUser))
            {
                Page::showMessage(2, 'El id de usuario no es valido', 'update.php');
            }
            if(!$usuario->getUsuarioForId())
            {
                Page::showMessage(2, 'El usuario no existe', 'index.php');
            }
            require_once('../../app/views/perfil/perfil.php');
            if(isset($_POST['modificar']))
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

                else if(!isset($_POST['tipo_usuario']) || !$usuario->setIdTipoUsuario($_POST['tipo_usuario']))
                {
                    $_POST['tipo_usuario'] = '';
                    throw new Exception('Seleccione el tipo de usuario');
                }
                else
                {
                    if($usuario->update())
                    {
                        Page::showMessage(1, "Usuario modificado", "update.php");
                    }
                    else
                    {
                        throw new Exception('Ocurrio un problema al momento de modificar al usuario');
                    }
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