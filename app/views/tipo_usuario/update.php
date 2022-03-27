<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::textInput('ID  Tipo de Usuario', 'id_tipo_usuario', isset($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : $tipo_usuario->getIdTipoUsuario(), 'Ingrese su correo electrónico', 'text');
            Page::textInput('Tipo de Usuario', 'tipo_usuario', isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : $tipo_usuario->getTipoUsuario(), 'Ingrese el tipo de usuario', 'text');
            Page::textInput('Estado', 'estado', isset($_POST['estado']) ? $_POST['estado'] : $tipo_usuario->getEstado(), 'Mofique el estado', 'text');
        
            
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>