<?php
$_urlBase = "http://examen.test:8080/";


define('URL_BASE', 'http://examen.test:8080/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'dbsistema');
define('DB_PASS', '');



function get_path($type, $arg1)
{
    $basePaths = [
        'base' => URL_BASE,
        'css' => URL_BASE . 'css/',
        'js' => URL_BASE . 'js/',
        'img' => URL_BASE . 'img/',
        'views' => URL_BASE . 'views/',
        'models' => URL_BASE . 'models/',
        'etc' => URL_BASE . 'etc/',
        'controllers' => URL_BASE . 'controllers/'
    ];

    return $basePaths[$type] . $arg1;
}
function get_UrlBase($arg1)
{
    return get_path('base', $arg1);
}
function get_views($arg1)
{
    return get_path('views', $arg1);
}
function get_views_disk($arg1)
{
    return $_SERVER["DOCUMENT_ROOT"] . '/views/' . $arg1;
}

function get_models($arg1)
{
    return  get_path('models', $arg1);
}

function get_etc($arg1)
{
    return get_path('etc', $arg1);
}

function get_controllers($arg1)
{
    return get_path('controllers', $arg1);
}

function get_controllers_disk($arg1)
{
    return $_SERVER["DOCUMENT_ROOT"] . '/controllers/' . $arg1;
}
function get_js($arg1)
{
    return get_path('js', $arg1);
}
function get_css($arg1)
{
    return get_path('css', $arg1);
}
function get_img($arg1)
{
    return get_path('img', $arg1);
}


// echo get_UrlBase('index.php');
// echo "<br>";
// echo get_views('index.php');
