<?php
    require_once('../../app/views/template/page.class.php');
    if(isset($_SESSION['auth']))
    {
        header('Location: ../../dashboard/home');
    }
    Page::templateLoginHeader('Login');
    require_once('../../app/controllers/auth/login_controller.php');
    Page::templateLoginFooter();
?>