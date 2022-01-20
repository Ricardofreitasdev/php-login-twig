<?php

use App\Controllers\LoginController;
use App\Controllers\LayoutController;

$app->get('/', [LayoutController::class, 'index']);
$app->get('/admin', [LayoutController::class, 'admin']);
$app->post('/login', [LoginController::class, 'index']);
$app->get('/exit', [LoginController::class, 'exit']);
