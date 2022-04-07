<?php
  require_once('../app/helpers/component.class.php');
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('location: dashboard/usuarios/');
  }
  // require_once '../app/models/database.class.php';
  include 'db.php';
  if (!empty($_POST['correo']) && !empty($_POST['password']))
  {
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
      header('location: ../dashboard/home/index.php');
    } else {
      // $message = 'Sorry, those credentials do not match';
      Component::showMessage(2, 'El usuario o la contrseña son incorrectas', '');
    }
  }
  else {
    // $message = 'Sorry, those credentials do not match';
    Component::showMessage(2, 'El usuario o la contrseña son incorrectas', '');
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="../web/js/sweetalert.min.js"></script>
  </head>
  <body style = 'height: 100vh; display: flex; align-items: center; background: rgb(91, 163, 167)'>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    
    <!-- <span>or <a href="signup.php">Crear una cuenta</a></span> -->

    <div style="display: flex; flex-direction: row; justify-content: center; margin: auto; top: 0; bottom: 0; background: #FFF">
      <div class="" style=" height: 500px;">
        <img src="../web/img/login.jpg" alt="Image of login 👌" height= '100%' >
      </div>
      <form action="login.php" method="POST" style="padding-left: 10px; padding-right: 10px; display:flex; flex-direction: column; align-items:center; justify-content: center;  height: 500px; width: 500px; margin: 0 ">
        <!-- <h1>Pet zona 🐕🐈</h1> -->
        <h2>LOGIN</h2>
        <hr>
        <input name="correo" type="text" placeholder="Escribe tu correo">
        <input name="password" type="password" placeholder="Escribe tu contraseña">
        <input type="submit" value="Acceder" style='background: #293D55;'>
      </form>
      
    </div>
    
  </body>
</html>