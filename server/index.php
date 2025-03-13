<?php

$base_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']),'/');
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo $request." ";

if(strpos($request, $base_dir) === 0) {
    $request = substr($request, strlen($base_dir));
}

echo $request." ";

if($request == '') {
    $request = '/';
}
echo $request." ";

$apis = [
    '/images' => ['controller' => 'ImageController', 'method' => 'loadImages'],
    '/upload_image' => ['controller' => 'ImageController', 'method' => 'uploadImage'],
    '/signup' => ['controller' => 'UserController', 'method' => 'addUser'],
    '/login' => ['controller' => 'UserController', 'method' => 'login'],
    '/test' => ['controller' => 'test', 'method' => "test"],
    '/seed' => ['controller' => 'Seed', 'method' => 'UserSeeder']
];



if (isset($apis[$request])) {
    $controllerName = $apis[$request]['controller'];
    $method = $apis[$request]['method'];
    if($controllerName == 'Seed'){
        require_once "database/seeds/{$controllerName}.php";
    }else{
        require_once "apis/v1/{$controllerName}.php";
    }
    
    
    $controller = new $controllerName();
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Error: Method {$method} not found in {$controllerName}.";
    }
} else {
    echo "404 Not Found";
}