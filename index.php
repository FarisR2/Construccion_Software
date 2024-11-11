<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN SYSTEM</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<?php
session_start();

$error = '';
$email = ''; // Inicializar la variable para evitar el error
$password = ''; // Inicializar la variable para evitar el error

if (isset($_SESSION['txtemail'])) {
  header("Location: http://localhost:8080/examen/vistas/dashboard.php");
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['txtemail']) && isset($_POST['txtpassword'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
  }

  if ($email == 'admin@gmail.com' && $password == '1234') {
    header("Location: http://localhost:8080/examen/vistas/dashboard.php");
    exit();
  } else {
    $error = 'credenciales incorrectas';
  }
}
?>


<div class="contenedor-login" id="contenedor-login">
  <div class="contenedor-header">

    <head>LOGIN</head>
  </div>
  <!-- Imagen Usuario -->
  <aside class="ladoizquierdo">
    <img src="img/avatar.png" alt="">
    <p class="img-email">EMAIL</p>
    <p class="img-password">PASSWORD</p>
  </aside>
  <!-- Formulario estándar login -->
  <article class="ladoderecho">
    <form action="" method="POST">
      <input type="text" name="txtemail" class="txtemail" placeholder="Email" autocomplete="off" required>
      <input type="password" name="txtpassword" class="txtpassword" placeholder="Password" autocomplete="off" required>

      <div class="submit">
        <button type="submit">Sign in</button>
      </div>

      <?php if (!empty($error)): ?>
        <span class="error">
          <?php echo $error; ?>
        </span>
      <?php endif; ?>
    </form>

  </article>
  <!-- Forgot -->
  <div class="forget">
    <section>
      <input type="checkbox" id="check">
      <label for="check">Remember me</label>
    </section>
    <section>
      <a href="#">Forgot Password?</a>
    </section>
  </div>


  <div class="register">
    <p>Don't have an account? <a href="./vistas/registar.php">Sign up</a></p>

  </div>
  </body>

</html>