<?php
// conexion de la base de datos
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/conexion.php';
?>

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

function get_connection() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbsistema"; // Se mantiene 'dbsistema'

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function get_user_credentials($email) { // Cambiado a 'email'
  require_once $_SERVER['DOCUMENT_ROOT'].'/models/conexion.php';
  $conn = get_connection();
  $stmt = $conn->prepare("SELECT username, password FROM usuarios WHERE BINARY username = ? LIMIT 1"); // Cambiado a 'login', 'email' y 'password'
  $stmt->bind_param("s", $email); // Parámetro ajustado a 'email'
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  $stmt->close();
  $conn->close();
  return $user;
}

$error = '';
$email = ''; // Inicializar la variable
$password = ''; // Inicializar la variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $v_email = $_POST["txtemail"] ?? ''; // Ajustado a 'txtemail'
  $v_password = $_POST["txtpassword"] ?? ''; // Se mantiene 'txtpassword'

  $user = get_user_credentials($v_email);

  if ($user && $v_password === $user['password']) { // Verificación de credenciales
      $_SESSION["txtemail"] = $v_email; // Se almacena 'txtemail' en la sesión
      header('Location: '.get_views('dashboard.php'));
      exit;
  } else {      header('Location: '.get_views('claveequivocada.php'));
      exit;
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
    <p>Don't have an account? <a href=<?php echo get_views('registar.php') ?>>Sign Up</a></p>

  </div>
  </body>

</html>