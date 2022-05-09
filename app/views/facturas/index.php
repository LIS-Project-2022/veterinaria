<div class='table-responsive'>
    <table id='dataTable' class='table table-hover' style='width:100%'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Propietario</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Acciones</th>      
        </tr>
    </thead>
    <tbody>

    <?php
        foreach($facturas as $fact)
        {
            print("
            <tr>
                <td>$fact[id_factura]</td>
                <td>$fact[propietario]</td>
                <td>$fact[fecha]</td>
                <td>$$fact[total]</td>
                <td id='actions'>
                    <a class='btn print' target='_blank' href='print.php?id=$fact[id_factura]' role='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir'>
                        <i class='bi bi-printer-fill'></i>
                    </a>
                    <a class='btn delete' href='delete.php?id=$fact[id_factura]' role='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar'>
                        <i class='bi bi-trash3-fill'></i>
                    </a>
                </td>
            </tr>
            ");
        }
    ?>
    </tbody>
    </table>
</div>

<?php
    Page::buttonRound('');
?>