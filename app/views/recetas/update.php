<form method="POST">
    <div class="row">
        <h5>Información de animal</h5>
        <?php
            Page::showSelect('Animal',     'nombre',     isset($_POST['nombre']) ? $_POST['nombre'] : $receta->getIdRegistro(), $registros);
            Page::textInput('Edad', 'edad', isset($_POST['edad']) ? $_POST['edad'] : $receta->getEdad(), 'Ingrese la edad', 'number');
            Page::textInput('Peso', 'peso', isset($_POST['peso']) ? $_POST['peso'] : $receta->getPeso(), 'Ingrese el peso', 'text');
            Page::textInput('Fecha', 'fecha', isset($_POST['fecha']) ? $_POST['fecha'] : $receta->getFecha(), '', 'date');
            Page::textArea('col-12','Medicamentos','medicamentos', isset($_POST['medicamentos']) ? $_POST['medicamentos'] : $receta->getMedicamentos());
            
        ?>
    </div>
    <div class='d-flex justify-content-end mb-3'>
        <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
        <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
    </div>
</form>