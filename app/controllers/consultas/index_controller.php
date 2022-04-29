<?php
    require_once('../../app/models/consulta.class.php');
    try
    {
        $consulta = new Consulta;
        $consultas = $consulta->getConsultas();
    }
    catch (Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/consultas/index.php');
?>