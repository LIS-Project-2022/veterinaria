<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('location: dashboard/usuarios/');
  }
  // require_once '../app/models/database.class.php';
  include 'db.php';

  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    // $correo = $_POST['correo'];
    // $passowrd = $_POST['passowrd'];
    // $sql_query_correo = "SELECT id, correo, password FROM usuarios WHERE correo = :correo";
    // Database::getRow($sql_query_correo,[$correo, $passowrd]);

    $records = $conn->prepare('SELECT id_usuario, correo, password FROM usuarios WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && ($_POST['password'] == $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('location: ../dashboard/usuarios/index.php');
    } else {
      // $message = 'Sorry, those credentials do not match';
      print_r( $results);
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Pet zona 🐕🐈</h1>
    <h2>Inicio</h2>
    <!-- <span>or <a href="signup.php">Crear una cuenta</a></span> -->

    <form action="login.php" method="POST">
      <input name="correo" type="text" placeholder="Escribe tu correo">
      <input name="password" type="password" placeholder="Escribe tu contraseña">
      <input type="submit" value="Submit">
    </form>
    <div class="image-container">
      <img src="../web/img/login_img.png" alt="Image of login 👌">
    </div>
  </body>
</html>