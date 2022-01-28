<?php

use App\Controllers\LayoutController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;

$app->get('/', [LayoutController::class, 'index']);
$app->get('/admin', [LayoutController::class, 'admin']);
$app->get('/admin/list', [LayoutController::class, 'list']);
$app->get('/exit', [LoginController::class, 'exit']);
$app->post('/login', [LoginController::class, 'index']);
$app->post('/register', [RegisterController::class, 'index']);
