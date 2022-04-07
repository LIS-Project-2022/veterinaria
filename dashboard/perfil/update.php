<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Modificar Perfil');
    require_once('../../app/controllers/perfil/update_perfil_controller.php');
    Page::templateFooter();
?>