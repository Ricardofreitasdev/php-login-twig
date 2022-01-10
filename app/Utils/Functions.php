<?php

use App\Messages\Flash;

return [
    'messages' => $messages = new \Twig\TwigFunction('messages', function ($index) {
        return Flash::get($index);
    }),
    'caps'     => $caps = new \Twig\TwigFunction('caps', function ($value) {
        return strtoupper($value);
    }),
];
