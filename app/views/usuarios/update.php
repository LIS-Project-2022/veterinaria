<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::textInput('Nombres', 'nombres', isset($_POST['nombres']) ? $_POST['nombres'] : $usuario->getNombres(), 'Ingrese sus nombres', 'text');
            Page::textInput('Apellidos', 'apellidos', isset($_POST['apellidos']) ? $_POST['apellidos'] : $usuario->getApellidos(), 'Ingrese sus apellidos', 'text');
            Page::textInput('Correo electrónico', 'correo', isset($_POST['correo']) ? $_POST['correo'] : $usuario->getCorreo(), 'Ingrese su correo electrónico', 'email');
            Page::textInput('Número de teléfono', 'telefono', isset($_POST['telefono']) ? $_POST['telefono'] : $usuario->getTelefono(), 'Ingrese su número de teléfono', 'text');
            Page::textInput('Usuario', 'usuario', isset($_POST['usuario']) ? $_POST['usuario'] : $usuario->getUsuario(), 'Ingrese un usuario', 'text');
            Page::showSelect('Tipo de Usuario', 'tipo_usuario', isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : $usuario->getIdTipoUsuario(), $tiposUsuario);
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='modificar' class="btn btn-agregar me-3">Modificar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>