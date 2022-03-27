<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::textInput('ID  Tipo de Usuario',          'id_tipo_usuario',          isset($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : '',            'Ingrese tipo de usuario', 'text');
            Page::textInput('Tipo de Usuario',              'tipo_usuario',          isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '',            'Ingrese tipo de usuario', 'text');
            Page::textInput('Estado',                       'estado',                isset($_POST['estado']) ? $_POST['estado'] : '',                        'Ingrese el estado', 'text');
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='agregar' class="btn btn-agregar me-3">Agregar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>