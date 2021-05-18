<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class PageController
{
    public static function hello(Request $request): object
    {
        $name = $request->attributes->get('name');

        ob_start();
        include __DIR__ . '/../pages/hello.php';
        return new Response(ob_get_clean());
    }

    public static function bye(): object
    {
        ob_start();
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }
}