<?php
    require_once('../../app/models/factura.class.php');
    try
    {
        $factura = new Factura;
        if(!isset($_GET['id']))
        {
            Page::showMessage(3, 'Seleccione una factura para eliminarla', 'index.php');
        }
        if(!$factura->setIdFactura($_GET['id']))
        {
            Page::showMessage(3, 'La id de la factura no es valida', 'index.php');
        }
        if(!$factura->getFactura())
        {
            header('Location: index.php');
        }
        else
        {
            require_once('../../app/views/facturas/delete.php');
        }

        if(isset($_POST['eliminar']))
        {
            if($factura->deleteFactura())
            {
                Page::showMessage(1, 'La factura fue eliminada', 'index.php');
            }
            else
            {
                throw new Exception(Database::getException());
            }
        }
    }
    catch(Exception $error)
    {
        Page::showMessage(3, $error->getMessage(), '');
    }
?>