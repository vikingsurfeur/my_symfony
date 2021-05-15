<?php

use Symfony\Component\HttpFoundation\Response;

$response = new Response();
$response->setContent(sprintf('Hello %s', htmlspecialchars(isset($_GET['name']) ? $name : 'World', ENT_QUOTES)));

$response->send();