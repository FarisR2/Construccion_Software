<?php
session_Start();


require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/conexion.php';

if (!isset($_SESSION["txtemail"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$host = "localhost";
$namedb = "dbsistema";
$userdb = "root";
$passwordb = "";

// Crear conexión
$conexion = new conexion($host, $namedb, $userdb, $passwordb);
$pdo = $conexion->obtenerconexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["datusuario"])) {  // Verifica que el campo no esté vacío
        $tempdbusername = $_POST["datusuario"];

        try {
            // Preparar y ejecutar consulta para eliminar
            $query = $pdo->prepare("DELETE FROM usuarios WHERE username = ?");
            $sentencia = $query->execute([$tempdbusername]);

            if ($sentencia) {
                echo "Usuario eliminado correctamente.";
            } else {
                echo "No se pudo eliminar el usuario. Verifica que exista.";
            }
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    } else {
        echo "El campo de usuario está vacío.";
    }
} else {
    echo "No hay datos enviados mediante POST.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>

<body>
    <form action="" method="POST">
        <label for="datusuario">¿A quién deseas eliminar?</label>
        <input type="text" name="datusuario" id="datusuario" required>
        <br>
        <button type="submit">Eliminar</button>
    </form>
</body>

</html>
