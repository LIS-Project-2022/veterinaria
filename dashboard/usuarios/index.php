<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Usuarios');
    require_once('../../app/controllers/usuarios/index_controller.php');
    Page::templateFooter();
?>