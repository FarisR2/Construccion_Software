<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoloads/autoloadUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}


$modeloUsuario = new modeloUsuario();
$usuarios = $modeloUsuario->obtenerUsuarios();
mostrarUsuarios($usuarios);
