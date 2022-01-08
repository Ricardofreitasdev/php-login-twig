<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class LayoutController
{

    public function index(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/home.html', [
            'page' => 'home',
            'name' => 'ricardo',
        ]);
    }

    public function contact(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/contato.html', [
            'name' => 'ricardo',
            'id'   => $args['id'],
        ]);
    }

}
