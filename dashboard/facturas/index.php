<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Facturas');
    require_once('../../app/controllers/facturas/index_controller.php');
    Page::templateFooter();
?>