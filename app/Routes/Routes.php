<?php

use App\Controllers\LayoutController;

$app->get('/', [LayoutController::class, 'index']);
$app->get('/contato', [LayoutController::class, 'contact']);
