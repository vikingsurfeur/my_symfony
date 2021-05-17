<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$routes = require __DIR__ . '/../src/routes.php';

$urlMatcher = new UrlMatcher($routes, $context);

try
{
    $result = $urlMatcher->match($request->getPathInfo());
    extract($result);

    ob_start();
    include __DIR__ . '/../src/pages/' . $result['_route'] . '.php';
    $response = new Response(ob_get_clean());
} catch (ResourceNotFoundException $error)
{
    $response = new Response('La page demandée n\'existe pas', 404);
} catch (Exception $error)
{
    $response = new Response('Une erreur serveur est survenue', 500);
}

$response->send();
