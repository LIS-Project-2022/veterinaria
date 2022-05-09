<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Citas');
    require_once('../../app/controllers/citas/index_controller.php');
    Page::templateFooter();
?>