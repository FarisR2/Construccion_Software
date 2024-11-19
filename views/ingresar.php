<?php
session_start();


require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/conexion.php';

// Asegúrate de iniciar la sesión

// Verifica si la sesión está activa
if (!isset($_SESSION["txtemail"])) {
    header("Location: " . get_UrlBase("index.php"));
    exit();
}

// Manejo del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Hay un post de datos <br>";
    echo htmlspecialchars($_POST["dbusername"]);
    echo "<br>";
    echo htmlspecialchars($_POST["dbpassword"]);
    echo "<br>";
    echo htmlspecialchars($_POST["dbperfil"]);
    echo "<br>";

    // Obtén los datos enviados por POST
    $tempdbusername = $_POST["dbusername"] ?? '';
    $tempdbpassword = $_POST["dbpassword"] ?? '';
    $tempdbperfil = $_POST["dbperfil"] ?? '';

    // Inserta los datos en la base de datos
    try {
        $host = "localhost";
        $namedb = "dbsistema";
        $userdb = "root";
        $passwordb = "";

        
        $conexion = new conexion($host, $namedb, $userdb, $passwordb);

        $pdo = $conexion->obtenerconexion(); // Asegúrate de que `get_connection()` retorne un objeto PDO válido
        $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
        $sentencia->execute([$tempdbusername, $tempdbpassword, $tempdbperfil]);
        echo "Usuario Registrado";
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
</head>

<body>

</body>
<h1>Ingresar al sistema</h1>


<form action="" method="POST">
    <label for="dbusername">Usuarios</label>
    <input type="text" name="dbusername", id="dbusername">
    <br>
    <label for="dbpassword">Password</label>
    <input type="text" name="dbpassword", id="dbpassword">
    <br>
    <label for="dbperfil">Perfil</label>
    <input type="text" name="dbperfil", id="dbperfil">
    <br>
    <button type="submit">Registrarse</button>
    </form>




</body>
</html>

</html>