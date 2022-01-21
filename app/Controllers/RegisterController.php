<?php

namespace App\Controllers;

use App\Models\User;
use App\Messages\Flash;
use App\Utils\LoggedUser;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RegisterController
{
    public function index(Request $request, Response $response)
    {
        $params = (array) $request->getParsedBody();
        $name = filter_var($params['name'], FILTER_SANITIZE_EMAIL);
        $email = filter_var($params['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($params['password'], FILTER_SANITIZE_STRING);
        $token = filter_var($params['token'], FILTER_SANITIZE_STRING);

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'name' => $name,
        ]);

        $_SESSION['logado'] = true;

        LoggedUser::add(json_decode($user));
        Flash::add('logged', 'login realizado com sucesso');

        return $response->withStatus(302)->withHeader('Location', '/admin');

    }

}
