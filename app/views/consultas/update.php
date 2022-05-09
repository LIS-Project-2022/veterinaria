<form method="POST">
    <div class='row'>
        <?php
            Page::showSelect('Ingrese al paciente', 'paciente', isset($_POST['paciente']) ? $_POST['paciente'] : $consulta->getIdRegistroAnimal(), $pacientes);
            Page::textInput('Propietario', 'propietario', isset($_POST['propietario']) ? $_POST['propietario'] : '', 'Ingrese el nombre del propietario', 'text' );
            Page::textInput('Peso (Kg)', 'peso', isset($_POST['peso']) ? $_POST['peso'] : $consulta->getPeso(), 'Ingrese el peso del animal', 'text' );
        ?>
        <div class='col-12 mb-3'>
            <label for="diagnostico" class='form-label'>Diagnostico</label>
            <textarea class='form-control' name="diagnostico" id="diagnostico" rows="8"><?=isset($_POST['diagnostico']) ? $_POST['diagnostico'] : $consulta->getDiagnostico() ?></textarea>
        </div>
    </div>
    <div class='d-flex justify-content-end mb-3'>
        <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
        <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
    </div>
</form>