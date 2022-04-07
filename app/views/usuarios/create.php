<form method="POST" autocomplete="off">
    <div class="row">
        <?php
            Page::textInput('Nombres',              'nombres',          isset($_POST['nombres']) ? $_POST['nombres'] : '',                  'Ingrese sus nombres', 'text');
            Page::textInput('Apellidos',            'apellidos',        isset($_POST['apellidos']) ? $_POST['apellidos'] : '',              'Ingrese sus apellidos', 'text');
            Page::textInput('Correo electrónico',   'correo',           isset($_POST['correo']) ? $_POST['correo'] : '',                    'Ingrese su correo electrónico', 'email');
            Page::textInput('Número de teléfono',   'telefono',         isset($_POST['telefono']) ? $_POST['telefono'] : '',                'Ingrese su número de teléfono', 'text');
            Page::textInput('Usuario',              'usuario',          isset($_POST['usuario']) ? $_POST['usuario'] : '',                  'Ingrese un usuario', 'text');
            Page::textInput('Contraseña',           'password',         isset($_POST['password']) ? $_POST['password'] : '',                'Ingrese una contraseña', 'password');
            Page::textInput('Confirmar contraseña', 'password_confirm', isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '','Confirme su contraseña', 'password');
            Page::showSelect('Tipo de Usuario',     'tipo_usuario',     isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '', $tiposUsuario);
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='agregar' class="btn btn-agregar me-3">Agregar</button>
            <a class="btn btn-cancelar" href="index.php" role="button">Cancelar</a>
        </div>
    </div>
</form>