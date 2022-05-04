<?php
    require_once('../../app/models/factura.class.php');

    try
    {
        $factura =  new Factura;
        $facturas = $factura->getFacturas();
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
    require_once('../../app/views/facturas/index.php')
?>