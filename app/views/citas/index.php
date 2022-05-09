<?php 
    Page::dataTable(['Id', 'Mascota','Fecha','Hora','Tipo de cita','Acciones'], $citas);
    Page::buttonRound('citas');
?>

