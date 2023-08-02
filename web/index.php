<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Thursdaybw\Pokecard\RandomCardController;
use Thursdaybw\Pokecard\OpenApiController;

$request = Request::createFromGlobals();
$path = $request->getPathInfo();

if ($path === '/') {
    $controller = new RandomCardController();
} elseif ($path === '/openapi.yaml') {
    $controller = new OpenApiController();
} else {
    $response = new Response('Not Found', 404);
    $response->send();
    return;
}

$response = $controller($request);
$response->send();
