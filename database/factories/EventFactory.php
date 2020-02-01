<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;


$factory->define(Event::class, function (Faker $faker) {
    $value = rand(0, 50);
    return [
        'value' => $value,
    ];
});
