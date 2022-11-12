<?php
//require __DIR__ . '/../vendor/autoload.php';
//$routes = require __DIR__ . '/../router/routes.php';
$routes = require __DIR__ . '/router/routes.php';
require __DIR__ . '/vendor/autoload.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
} else {
    $path = '/';
}

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit;
}

if (!isset($_SESSION['logged']) && $path !== "/" && $path !== "/login") {
    header('Location: /');
    exit();
}

$controller = new $routes[$path][0]();
$method = $routes[$path][1];
$response = $controller->$method($request);
