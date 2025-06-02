<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/Database.php';

spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/controllers/' . $class . '.php',
        __DIR__ . '/models/' . $class . '.php',
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$dbClass = new Database();
$db = $dbClass->getConnection();

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);

$basePath = '/projetoathia';  // Sua pasta no htdocs

if (strpos($request, $basePath) === 0) {
    $request = substr($request, strlen($basePath));
}
$request = trim($request, '/');

$parts = explode('/', $request);

$controllerName = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'EmpresaController';
$action = $parts[1] ?? 'index';
$params = array_slice($parts, 2);

if (!class_exists($controllerName)) {
    http_response_code(404);
    echo "Controller '$controllerName' não encontrado.";
    exit;
}

$controller = new $controllerName($db);

if (!method_exists($controller, $action)) {
    http_response_code(404);
    echo "Ação '$action' não encontrada no controller '$controllerName'.";
    exit;
}

call_user_func_array([$controller, $action], $params);
