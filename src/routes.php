<?php

use App\Controller\PageController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}',
                ['name' => 'World',
                '_controller' => [new PageController(), 'hello']]));

$routes->add('bye', new Route('/bye',
                ['_controller' => [new PageController(), 'bye']]));

return $routes;