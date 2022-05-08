<?php
    require_once('../../app/models/usuario.class.php');

    $user = new Usuario;
    $user->logout();
    header('Location: ../../index.php');

?>