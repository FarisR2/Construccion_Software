<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/autoloads/autoloadLogin.php';

$modeloUsuario = new modeloUsuario();
$usuarios = $modeloUsuario->obtenerUsuarios();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = $_POST["txtusername"] ?? '';
    $v_password = $_POST["txtpassword"] ?? '';

    $usuarioEncontrado = array_filter($usuarios, function($user) use ($v_username, $v_password) {
        return $user["username"] === $v_username && $user["password"] === $v_password;
    });

    if (!empty($usuarioEncontrado)) {
        $_SESSION["txtusername"] = $v_username;
        header('Location: ' . get_controllers('controladorDashboard.php'));
        exit();
    } else {
        $error = 'Credenciales incorrectas';
    }
}
include get_views_disk("vistaLogin.php");
