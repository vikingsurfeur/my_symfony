<?php

require __DIR__ . '/vendor/autoload.php';

$name = isset($_GET['name']) ? $_GET['name'] : 'David';

header('Content-type: text/html; charset=utf-8');

printf('Hello %s', htmlspecialchars($name, ENT_QUOTES));