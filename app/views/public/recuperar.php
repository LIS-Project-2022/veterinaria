<div class="row card-container">
    <div class="col-12 col-md-6 p-0 img-container">
        <img src="../../web/img/login.jpg" alt="Image of login 👌" >
    </div>

    <?php
        if(!isset($_GET['token']))
        {
    ?>
    <form method='POST' class="col-12 col-md-6 p-3 formulario" autocomplete='off'>
        <h1 class='text-center'>Recuperar Contraseña</h1>
        <div class="col-10 mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name='usuario' placeholder="Ingrese su usuario" value='<?=isset($_POST['usuario']) ? $_POST['usuario'] : '' ?>'>
        </div>
        <div class="col-10 mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name='correo' placeholder="Ingrese su correo electrónico" value='<?=isset($_POST['correo']) ? $_POST['correo'] : '' ?>'>
        </div>
        <button type="submit" class="btn btn-primary" name='recuperar' style='background: #293D55;'>Recuperar</button>
        <a href='index.php' class="btn btn-secondary text-white mt-2 col-6">Regresar</a>
    </form>
    <?php
        }
        else
        {
    ?>
    <form method='POST' class="col-12 col-md-6 p-3 formulario" autocomplete='off'>
        <h1 class='text-center'>Cambiar Contraseña</h1>
        <div class="col-10 mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name='password' 
                placeholder="Ingrese su nueva contraseña" 
                value='<?=isset($_POST['password']) ? $_POST['password'] : '' ?>'
            >
        </div>
        <div class="col-10 mb-3">
            <label for="password_confirm" class="form-label">Confirme nueva contraseña</label>
            <input 
                type="password" 
                class="form-control" 
                id="password_confirm" 
                name='password_confirm' 
                placeholder="Confirme su nueva contraseña" 
                value='<?=isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '' ?>'
            >
        </div>
        <button type="submit" class="btn btn-primary" name='change' style='background: #293D55;'>Cambiar Contraseña</button>
        <a href='index.php' class="btn btn-secondary text-white mt-2 col-6">Regresar</a>
    </form>
    <?php
        }
    ?>
</div>

    