<?php

if(!$capsule::schema()->hasTable('users')) {
    $capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->timestamps();
    });
}

