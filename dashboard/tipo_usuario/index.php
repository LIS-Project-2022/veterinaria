<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Registro de Tipo de usuario');
    require_once('../../app/controllers/tipo_usuario/index_controller.php');
    Page::templateFooter();
?>