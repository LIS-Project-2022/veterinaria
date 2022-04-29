<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Consultas');
    require_once('../../app/controllers/consultas/index_controller.php');
    Page::templateFooter();
?>