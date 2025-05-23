<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload.php';

// Create a simple mechanism to handle requests without the Symfony Runtime component
$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = (bool) ($_SERVER['APP_DEBUG'] ?? ($env === 'dev'));

$kernel = new Kernel($env, $debug);
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);