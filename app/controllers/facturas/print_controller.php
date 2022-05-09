<?php
    require_once('../../app/models/factura.class.php');
    try
    {
        $factura = new Factura;
        if(!isset($_GET['id']))
        {
            header('Location: index.php');
        }
        if(!$factura->setIdFactura($_GET['id']))
        {
            header('Location: index.php');
        }
        $facturaInfo = $factura->getInfoPDF();
        if(!$facturaInfo)
        {
            header('Location: index.php');
        }
        else
        {
            $detallesFactura = $factura->getInfoDetallePDF();
            require_once('../../app/helpers/dompdf/crearpdf.php');
        }
    }
    catch(Exception $error)
    {
        echo $error->getMessage();
        header('Location: index.php');
    }
?>