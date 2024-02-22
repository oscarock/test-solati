<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\Controller\StartController', 'index']);
    $r->addRoute('GET', '/users', ['App\Controller\UserController', 'index']);
    $r->addRoute('GET', '/users/{id:\d+}', ['App\Controller\UserController', 'show']);
    $r->addRoute('POST', '/users', ['App\Controller\UserController', 'create']);
    $r->addRoute('PUT', '/users/{id:\d+}', ['App\Controller\UserController', 'update']);
    $r->addRoute('DELETE', '/users/{id:\d+}', ['App\Controller\UserController', 'delete']);
};
