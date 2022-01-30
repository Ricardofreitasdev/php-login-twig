<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig;
use App\Messages\Flash;
use App\Utils\Validate;
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

        $logado = Validate::existSession();
        
        if(!$logado){
            return $response->withStatus(302)->withHeader('Location', '/');
        }


        $view = Twig::fromRequest($request);
        return $view->render($response, 'pages/admin.html', [
            'page' => 'admin',
        ]);
    }

    public function list(Request $request, Response $response, $args)
    {

        $logado = Validate::existSession();
        
        if(!$logado){
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
