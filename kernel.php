<?php

session_start();

include_once __DIR__.'/config.php';
include_once __DIR__.'/connection/db.php';

$db = Connection::connect($config);

spl_autoload_register(function($class) {
    if (file_exists(__DIR__.'/controllers/'.$class.'.php')) {
        require __DIR__.'/controllers/'.$class.'.php';
    }

    if (file_exists(__DIR__.'/models/'.$class.'.php')) {
        require __DIR__.'/models/'.$class.'.php';
    }
});

include_once __DIR__.'/routes/route.php';

if (! empty($route)) {
    $routes = explode('@', $route);
    $controller = ucfirst($routes[0]);
    $model = ucfirst(str_replace('Controller', 'Model', $controller));
    $action = lcfirst($routes[1]);
} else {
    $controller = 'AppController';
    $model = 'AppModel';
    $action = 'indexAction';
}

$controller_instance = new $controller();
$model_instance = new $model();
$controller_instance->model = $model_instance;
$model_instance->db = $db;
$index = $controller_instance->$action();
