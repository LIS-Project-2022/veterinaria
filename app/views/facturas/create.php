<form method="POST">
    <div class="row">
        <?php
            Page::showSelect('Propietario', 'propietario', isset($_POST['propietario']) ? $_POST['propietario'] : '', $propietarios);
            Page::showSelectMultiple('Servicio/s', 'servicios', isset($_POST['servicios']) ? $_POST['servicios'] : [], $servicios);
        ?>
    </div>
    <div class='d-flex justify-content-end mb-3'>
        <button type="submit" name='agregar' class="btn btn-agregar me-3">Crear</button>
        <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
    </div>
</form>