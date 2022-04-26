<div class="row card-container">
    <div class="col-12 col-md-6 p-0 img-container">
        <img src="../../web/img/login.jpg" alt="Image of login 👌" >
    </div>
    <form method='POST' class="col-12 col-md-6 p-3 formulario" autocomplete='off'>
        <h1 class='text-center'>Login</h1>
        <div class="col-10 mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name='correo' placeholder="Ingrese su correo electrónico">
        </div>
        <div class="col-10 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name='password' placeholder="Ingrese su contraseña">
        </div>
        <a href="recuperar.php" class='mb-3'>¿Olvidaste tu contraseña?</a>
        <button type="submit" class="btn btn-primary" name='acceder' style='background: #293D55;'>Acceder</button>
        <div class="g-signin2 mt-2" data-onsuccess="onSignIn"></div>
    </form>
</div>
    