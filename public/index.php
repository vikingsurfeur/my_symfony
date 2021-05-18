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

    $request->attributes->add($result);

    $response = call_user_func($result['_controller'], $request);
} catch (ResourceNotFoundException $error)
{
    $response = new Response('La page demandée n\'existe pas', 404);
} catch (Exception $error)
{
    $response = new Response('Une erreur serveur est survenue', 500);
}

$response->send();
