<?php

error_reporting(0);
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$twig = Twig::create(__DIR__ . '/../Layout/views', ['debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$app->add(TwigMiddleware::create($app, $twig));

require_once __DIR__. '/Routes.php';

$app->run();
