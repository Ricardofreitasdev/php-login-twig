<?php

error_reporting(0);

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$twig = Twig::create(__DIR__ . '/../Layout/views', ['debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$functions = require __DIR__ . '/../Utils/Functions.php';

foreach ($functions as $key => $value) {
    $twig->getEnvironment()->addFunction($value);
}

$app->add(TwigMiddleware::create($app, $twig));

require_once __DIR__ . '/Routes.php';

$app->run();
