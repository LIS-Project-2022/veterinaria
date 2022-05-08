<?php
    require_once('../../app/views/template/page.class.php');
    if(isset($_SESSION['auth']))
    {
        header('Location: ../../dashboard/home');
    }
    Page::templateLoginHeader('Recuperar Contraseña');
    require_once('../../app/controllers/auth/recuperar_password_controller.php');
    Page::templateLoginFooter();
?>