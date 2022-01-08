<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

if (getenv('DRIVER') === 'mysql') {

    $capsule->addConnection([
        'driver'    => getenv('DRIVER'),
        'host'      => getenv('HOST'),
        'database'  => getenv('DATABASE'),
        'username'  => getenv('USERNAME'),
        'password'  => getenv('PASSWORD'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);
}

if (getenv('DRIVER') === 'sqlite') {

    $capsule->addConnection([
        'driver'   => getenv('DRIVER'),
        'database' => __DIR__ . "/database.sqlite",
        'prefix'   => '',
    ]);
}

$capsule->setAsGlobal();
$capsule->bootEloquent();

require_once __DIR__ . "/Migrations/create_databases.php";
