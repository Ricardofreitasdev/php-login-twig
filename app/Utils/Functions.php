<?php

use App\Messages\Flash;
use App\Utils\LoggedUser;

return [
    'messages'   => $messages = new \Twig\TwigFunction('messages', function ($index) {
        return Flash::get($index);
    }),
    'LoggedUser' => $LoggedUser = new \Twig\TwigFunction('LoggedUser', function () {
        return json_decode(json_encode(LoggedUser::get()), true);
    })
];
