<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/dexPhp/', 'App\Controller\HomeController::index');
    $route->addRoute('GET', '/dexPhp/pokemon', 'App\Controller\PokemonController::index');
    // 他のルートもここに追加
});
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

echo 'HTTP Method: ' . $httpMethod . '<br>';
echo 'Original URI: ' . $uri . '<br>';

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

echo 'Processed URI: ' . $uri . '<br>';

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

echo '<pre>';
print_r($routeInfo);
echo '</pre>';

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode('::', $handler, 2);
        call_user_func_array([new $class, $method], $vars);
        break;
}
