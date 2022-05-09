<?php
    require_once('../../app/models/propietario.class.php');
    require_once('../../app/models/servicio.class.php');
    require_once('../../app/models/factura.class.php');
    require_once('../../app/models/detalle_factura.class.php');
    try
    {
        $propietario = new Propietario;
        $factura = new Factura;
        $servicio = new Servicio;
        $detalle_factura = new DetalleFactura;

        $servicios = $factura->getServicios();
        $propietarios = $propietario->getPropietarios();

        if(isset($_POST['agregar']))
        {
            if(!isset($_POST['propietario']) || !$factura->setIdPropietario($_POST['propietario']))
            {
                throw new Exception('Ingrese el propietario');
            }

            $total = 0;

            for($i = 0; $i < count($_POST['servicios']); $i++ )
            {
                $servicio->setIdServicio($_POST['servicios'][$i]);
                $total += doubleval($servicio->getPrecioForId()[0]);
            }

            if(!$factura->setTotal($total))
            {
                throw new Exception('Ocurrio un problema al calcular el total');
            }

            if($factura->createFactura())
            {
                for($i = 0; $i < count($_POST['servicios']); $i++ )
                {
                    $detalle_factura->setIdServicio($_POST['servicios'][$i]);
                    $detalle_factura->setIdFactura( $factura->getIdFactura() );
                    $detalle_factura->createDetalleFatura();
                }

                Page::showMessage(1, 'Factura creada', 'index.php');
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
    require_once('../../app/views/facturas/create.php');
?>