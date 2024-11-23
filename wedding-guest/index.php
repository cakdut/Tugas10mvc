<?php
// Autoload sederhana
spl_autoload_register(function ($class) {
    $paths = ['controllers', 'models'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/$path/$class.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Routing sederhana
$controller = $_GET['controller'] ?? 'Guest';
$action = $_GET['action'] ?? 'index';

// Nama kelas controller
$controllerName = $controller . 'Controller';



if (class_exists($controllerName)) {
    $controllerInstance = new $controllerName();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Aksi '$action' tidak ditemukan.";
    }
} else {
    echo "Controller '$controllerName' tidak ditemukan.";
}
