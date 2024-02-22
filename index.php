<?php
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once "app/Config/database.php";

$database = Database::getInstance();

$dispatcher = FastRoute\simpleDispatcher(include(__DIR__ . '/app/Config/routes.php'));

$request = ServerRequestFactory::fromGlobals();
$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header('HTTP/1.0 405 Method Not Allowed');
        echo 'Método no permitido';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controllerClass, $action] = $routeInfo[1];
        $controller = new $controllerClass();
        $controller->$action($routeInfo[2]);
        break;
}