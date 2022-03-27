<form method="POST" autocomplete="off">
    <div class="row">
    <?php
            Page::textInput('Contraseña', 'password_old', isset($_POST['nombres']) ? $_POST['nombres'] : '', 'Ingrese su contraseña actual', 'password');
            Page::textInput('Nueva contraseña', 'password_new1', isset($_POST['apellidos']) ? $_POST['apellidos'] : '', 'Ingrese su nueva contraseña', 'password');
            Page::textInput('Nueva contraseña', 'password_new2', isset($_POST['correo']) ? $_POST['correo'] : '', 'Ingrese su nueva contraseña otra vez', 'password');
        ?>
        <div class='d-flex justify-content-end'>
            <button type="submit" name='update_password' class="btn btn-agregar me-3">Modificar contraseña</button>
            <a class="btn btn-cancelar" href="../usuarios" role="button">Cancelar</a>
        </div>
    </div>
</form>