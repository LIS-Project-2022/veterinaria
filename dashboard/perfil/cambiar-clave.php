<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Modificar contraseña');
    require_once('../../app/controllers/perfil/update_password_controller.php');
    Page::templateFooter();
?>