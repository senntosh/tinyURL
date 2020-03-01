<?php
require __DIR__ . "/../config/database.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('url', function ($table) {

    $table->increments('id');

    $table->string('key');

    $table->text('url');

    $table->timestamps();

});