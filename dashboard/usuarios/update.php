<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Modificar Usuario');
    require_once('../../app/controllers/usuarios/update_controller.php');
    Page::templateFooter();
?>