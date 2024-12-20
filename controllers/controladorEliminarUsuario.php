<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/autoloads/autoloadEliminar.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$modeloUsuario = new modeloUsuario();
$mensaje = '';
if (($_SERVER["REQUEST_METHOD"] == "POST") || isset($_GET['username'])) {
    $datusuario = $_POST["datusuario"] ?? $_GET["username"];

    try {
        $modeloUsuario->eliminarUsuario($datusuario);
        $mensaje = "<span style='color: green;'>Usuario eliminado con exito" . "</span>";
    } catch (PDOException $e) {
        $mensaje = "Hubo un error  ...<br>" . $e->getMessage();
    }
}

mostrarFormularioEliminacion($mensaje);
