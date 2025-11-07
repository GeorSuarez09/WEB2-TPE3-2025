<?php
require_once './libs/router/router.php';
//require_once './libs/jwt/jwt.middleware.php';
//require_once './app/middlewares/guard-api.middleware.php';
require_once './app/controllers/viajes-api.controller.php';
//require_once './app/controllers/auth-api.controller.php';

// instancio el router
$router = new Router();

//$router->addMiddleware(new JWTMiddleware());

// defino los endpoints
$router->addRoute('viajes',     'GET', 'viajesApiController', 'getViajes');
$router->addRoute('viajes/:id', 'GET', 'viajesApiController', 'getViajesById');
$router->addRoute('viajes',         'POST',     'viajesApiController',    'insertViaje');
$router->addRoute('viajes/:id',     'PUT',      'viajesApiController',    'updateViaje');
$router->addRoute('viajes/:id',     'DELETE',   'viajesApiController',    'deleteViaje');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
