<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$name = $request->query->get('name', 'David');

$response = new Response();
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES)));

$response->send();