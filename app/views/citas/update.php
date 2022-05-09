<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::showSelect('Elige tu mascota',     'animal_nombre',     isset($_POST['animal_nombre']) ? $_POST['animal_nombre'] : '', $animalNombre);
            Page::textInput('Ingrese la fecha', 'fecha', isset($_POST['fecha']) ? $_POST['fecha'] : '', 'Ingrese la fecha', 'date');
            Page::textInput('Ingrese la hora','hora',isset($_POST['hora']) ? $_POST['hora'] : '','Ingrese la hora', 'time');
            Page::showSelect('Tipo de cita',     'tipo_cita',     isset($_POST['tipo_cita']) ? $_POST['tipo_cita'] : '', $tipoCita);
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>