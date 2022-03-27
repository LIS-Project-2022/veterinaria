<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Inicio');
    require_once('../../app/views/home/index.php');
    Page::templateFooter();
?>