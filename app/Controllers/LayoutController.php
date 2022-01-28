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
        return $view->render($response, 'pages/login.html', [
            'page' => 'login',
        ]);
    }

    public function admin(Request $request, Response $response, $args)
    {

        if(is_null($_SESSION['logado'])){

            Flash::add('message-type', 'alert');
            Flash::add('message', 'voce nao esta logado');

            return $response->withStatus(302)->withHeader('Location', '/');
        }

        $users = User::all();
        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/admin.html', [
            'page' => 'admin',
            'users' => json_decode($users, true)         
        ]);
    }

    public function list(Request $request, Response $response, $args)
    {

        if(is_null($_SESSION['logado'])){

            Flash::add('message-type', 'alert');
            Flash::add('message', 'voce nao esta logado');

            return $response->withStatus(302)->withHeader('Location', '/');
        }

        $users = User::all();
        $view = Twig::fromRequest($request);
        return $view->render($response, 'components/list.html', [
            'page' => 'admin',
            'users' => json_decode($users, true)         
        ]);
    }
    

}
