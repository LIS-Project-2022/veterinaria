<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="http://localhost/veterinaria/web/css/stylePDF.css">
</head>
<body>
<div>
    <table class='header'>
        <thead>
            <tr>
                <th>
                    <h1 class='title'>PET ZONA</h1>
                </th>
                <th>
                    <div>
                        <h3>Factura No.</h3>
                        <h3><?=$facturaInfo['id_factura']?></h3>
                    </div>
                </th>
                <th>
                    <div>
                        <h3>Fecha</h3>
                        <h3><?php $date = new DateTime($facturaInfo['fecha'], new DateTimeZone(date_default_timezone_get())); echo $date->format('d/M/Y')?></h3>
                    </div>
                </th>
            </tr>
        </thead>
    </table>
    <div class='sub-header'>
        <h3>Dirección: Colonia Escalón</h3>
        <h3>Correo: petzona@gmail.com</h3>
        <h3>Teléfono: 2200-9652</h3>
    </div>
    <div class='body'>
        <div class='nombre-prop'>
            <h3>Facturar a: <?=$facturaInfo['propietario']?> </h3>
        </div>
    </div>
    <div class='container-detalle'>
        <table class='detalle'>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th class='align-center'>Precio por servicio</th>
                </tr>
            </thead>
            <tbody>
				<?php
					foreach($detallesFactura as $detalle)
					{
						print("
						<tr>
							<td>$detalle[servicio]</td>
							<td class='align-center'>$$detalle[precio]</td>
						</tr>
						");
					}
				?>
            </tbody>
            <tfoot>
                <tr>
                    <td class='foot'>Total</td>
                    <td class='align-center color-black'><?=$facturaInfo['total']?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

</body>
</html>