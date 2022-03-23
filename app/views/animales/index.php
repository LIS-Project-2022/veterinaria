<?php 
    Page::dataTable(['Id', 'Nombres', 'Apellidos', 'Correo', 'Usuario', 'Telefono', 'Acciones'], $usuarios);
    Page::buttonRound('');
?>