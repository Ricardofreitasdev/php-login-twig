<?php

namespace App\Controllers;

use App\Messages\Flash;
use App\Models\User;
use App\Utils\LoggedUser;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController
{

    public function index(Request $request, Response $response)
    {
        $params = (array) $request->getParsedBody();

        $email    = filter_var($params['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($params['password'], FILTER_SANITIZE_STRING);

        try {

            $user = $this->validateLogin($email, $password);

            $_SESSION['logado'] = true;

            LoggedUser::add(json_decode($user));
            Flash::add('logged', 'login realizado com sucesso');

            return $response->withStatus(302)->withHeader('Location', '/admin');

        } catch (\Throwable $e) {

            Flash::add('logged', $e->getMessage());
            return $response->withStatus(302)->withHeader('Location', '/');
        }

    }

    private function validateLogin($email, $password)
    {
        $existUser = $this->getByEmail($email);

        if (!$existUser) {
            throw new \Exception("Falha ao logar");
        }

        if ($existUser['password'] !== $password) {
            throw new \Exception("Falha ao logar");

        }

        return $existUser;

    }

    private function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
