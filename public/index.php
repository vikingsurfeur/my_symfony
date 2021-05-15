<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$response = new Response();

$pathInfo = $request->getPathInfo();

$map = [
    '/hello'    => 'hello.php',
    '/bye'      => 'bye.php'
];

if (isset($map[$pathInfo]))
{
    extract($request->query->all());
    ob_start();
    include __DIR__ . '/../src/pages/' . $map[$pathInfo];
    $response->setContent(ob_get_clean());
} else
{
    $response->setContent('La page demandée n\'existe pas');
    $response->setStatusCode(404);
}

$response->send();
