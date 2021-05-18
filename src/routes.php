<?php

use App\Controller\PageController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}',
                ['name' => 'World',
                '_controller' => 'App\Controller\PageController::hello']));

$routes->add('bye', new Route('/bye',
                ['_controller' => 'App\Controller\PageController::bye']));

return $routes;