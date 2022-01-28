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
        $token = filter_var($params['token'], FILTER_SANITIZE_STRING);


        try {

            $user = $this->validateLogin($email, $password, $token);
            
            $_SESSION['logado'] = true;
            LoggedUser::add(json_decode($user));
            Flash::add('message', 'login realizado com sucesso');
            Flash::add('message-type', 'sucess');

            return $response->withStatus(302)->withHeader('Location', '/admin');

        } catch (\Throwable $e) {

            Flash::add('message', $e->getMessage());
            Flash::add('message-type', 'alert');

            return $response->withStatus(302)->withHeader('Location', '/');
        }

    }

    public function exit(Request $request, Response $response)
    {
         unset($_SESSION['logado']);
         unset($_SESSION['logged']);
         unset($_SESSION['loggedUser']);
         unset($_SESSION['token']);
         LoggedUser::exit();

         return $response->withStatus(302)->withHeader('Location', '/');

    }

    private function validateLogin($email, $password, $token)
    {
        $existUser = $this->getByEmail($email);

        if($token !== $_SESSION['token']){
            throw new \Exception("CSRF error");
        }

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
