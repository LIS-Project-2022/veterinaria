<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Crear Cita');
    require_once('../../app/controllers/citas/create_controller.php');
    Page::templateFooter();
?>