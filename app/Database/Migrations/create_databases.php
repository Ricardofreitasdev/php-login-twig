<?php

if(!$capsule::schema()->hasTable('customer')) {
    $capsule::schema()->create('customer', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->timestamps();
    });
}


