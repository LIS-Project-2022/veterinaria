<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
// defined('BASEPATH') or exit('No se permite el acceso directo');
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

ob_start(); //Abriendo buffer
require_once("../../app/views/facturas/print.php");
$html = ob_get_contents(); //leyendo el contenido del buffer
ob_end_clean(); //Cerrando el buffer

 
$options = $pdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$pdf->setOptions($options);

// Definimos el tamaño y orientación del papel que queremos.
// $pdf->set_paper("A4", "portrait");
$pdf->set_paper(array(0,0,700,500));
 
// Cargamos el contenido HTML.
$pdf->load_html($html);
 
// Renderizamos el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream('Factura.pdf', array("Attachment" => false));