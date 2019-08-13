<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Actor::class, function (Faker $faker) {
    return [
        'is_administrator' => false,
        'is_technician' => false,
        'is_participant' => true,
        'is_voluntary' => false
    ];
});
