<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Modificar Registro de tipo de Usuario');
    require_once('../../app/controllers/tipo_usuario/update_controller.php');
    Page::templateFooter();
?>