<?php

use App\Messages\Flash;
use App\Utils\LoggedUser;

return [
    'messages'   => $messages = new \Twig\TwigFunction('messages', function ($index) {
        return Flash::get($index);
    }),
    'LoggedUser' => $LoggedUser = new \Twig\TwigFunction('LoggedUser', function () {
        return json_decode(json_encode(LoggedUser::get()), true);
    }),
    'csrf' => $csrf = new \Twig\TwigFunction('csrf', function () {
        $_SESSION['token'] = sha1(rand());
        return $_SESSION['token'];
    })
];

