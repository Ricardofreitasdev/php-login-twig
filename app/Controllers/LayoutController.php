<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig;
use App\Messages\Flash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LayoutController
{

    public function index(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/home.html', [
            'page' => 'home',
        ]);
    }

    public function admin(Request $request, Response $response, $args)
    {

        if(is_null($_SESSION['logado'])){
            Flash::add('logged', 'voce nao esta logado');
            return $response->withStatus(302)->withHeader('Location', '/');
        }

        $users = User::all();
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/admin.html', [
            'page' => 'home',
            'users' => json_decode($users, true)         
        ]);
    }
    

}
