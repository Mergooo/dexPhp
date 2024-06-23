<?php
// Display all error reports
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Composer's autoloader

require_once __DIR__ . '/../vendor/autoload.php';

// Set up routing using FastRoute
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/dexPhp/', 'App\Controller\HomeController::index');
    $route->addRoute('GET', '/dexPhp/pokemon', 'App\Controller\PokemonController::index');
    $route->addRoute('GET', '/dexPhp/trainer', 'App\Controller\TrainerController::index'); // 追加
    $route->addRoute('GET', '/dexPhp/trainer/add', 'App\Controller\TrainerController::add'); // 追加フォームの表示
    $route->addRoute('POST', '/dexPhp/trainer/add', 'App\Controller\TrainerController::create'); // フォーム送信の処理
    $route->addRoute('GET', '/dexPhp/trainer/{id}/edit', 'App\Controller\TrainerController::edit'); // 編集フォームの表示
    $route->addRoute('POST', '/dexPhp/trainer/{id}/update', 'App\Controller\TrainerController::update'); // フォーム送信の処理
    $route->addRoute('POST', '/dexPhp/trainer/{id}/delete', 'App\Controller\TrainerController::delete'); // フォーム送信の処理
    $route->addRoute('GET', '/dexPhp/pokemon/{name}/entry', 'App\Controller\PokemonController::showPokedexEntry');
});
// Get the HTTP method and URI from the request
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Remove query string from URI if present
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatch the request to the appropriate route handler
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// Handle the route match result
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // No matching route was found
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // Method is not allowed for the matching route
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        // Route was found, dispatch to the handler
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode('::', $handler, 2);
        call_user_func_array([new $class, $method], $vars);
        break;
}
