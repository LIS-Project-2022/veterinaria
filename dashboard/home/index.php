<?php
    require_once('../../app/views/template/page.class.php');
    Page::templateHeader('Bienvenido a Pet Zona');
    require_once('../../app/views/home/index.php');
    Page::templateFooter();
?>
