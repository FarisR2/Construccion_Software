<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';

// agregar la sesion 
// if (!isset($_SESSION['txtusername'])) {
//     header("Location: " . get_UrlBase('login.php'));
// }

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$opcion = $_GET["opcion"] ?? 'inicio';
$contenido = '';

switch ($opcion) {
    case 'inicio': // ollydbg crack
        $contenido = get_views_disk('inicio.php');
        break;
    case 'ver':
        ob_start();
        include get_controllers_disk('controladorUsuario.php');
        $contenido = ob_get_clean();
        break;
    case 'ingresar':
        ob_start();
        include get_controllers_disk('controladorIngresarUsuario.php');  
        $contenido = ob_get_clean();
        break;
    case 'modificar':
        include get_controllers_disk('controladorModificarUsuario.php');
        $contenido = ob_get_clean();
        break;
    case 'eliminar':
        include get_controllers_disk('controladorEliminarUsuario.php');
        $contenido = ob_get_clean();
        break;
    default:
        http_response_code(400);
        $contenido = "<h1> Error </h1>";
        break;
}


include get_views_disk('vistaDashboard.php');
// include funciona con rutas en disco
// $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// // Guardar la página actual en la sesión
// $_SESSION['current_page'] = $page;
