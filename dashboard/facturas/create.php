<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Crear Factura');
    require_once('../../app/controllers/facturas/create_controller.php');
    Page::templateFooter();
?>