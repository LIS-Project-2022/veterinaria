<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Agregar Consulta');
    require_once('../../app/controllers/consultas/create_controller.php');
    Page::templateFooter();
?>