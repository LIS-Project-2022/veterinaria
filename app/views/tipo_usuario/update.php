<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::textInput('Tipo de Usuario', 'tipo_usuario', isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : $tipo['tipo_usuario'], 'Ingrese el tipo de usuario', 'text');
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>