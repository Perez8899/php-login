<?php

  require 'database.php';

  $message = '';
  //si no estan vacio email y password
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    //cifrado  de contraseña
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      //echo "<p >Usuario creado Exitosamente</p>";
      $message = "<strong><p class='error'>Usuario creado Exitosamente</p></strong>";
    } else {
      $message = 'A ocurrido un error al crear la Contraseña';
    }
  }
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese email">
      <input name="password" type="password" placeholder="Ingrese su Comtraseña">
      <input name="confirm_password" type="password" placeholder="Confirmar Contraseña">
      <input type="submit" value="Submit">
    </form>

  </body>
  <script src="desaparecer/java.js"></script>
</html>
