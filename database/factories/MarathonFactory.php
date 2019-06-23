<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\App\Models\Marathon::class, function (Faker $faker) {

    // Data falsa do evento
    $date = $faker->dateTimeBetween('-10 years', '+10 years');

    // Data falsa do inicio do período de inscrição, sendo
    // 60 dias anteriores a data da maratona ...
    $starts = Carbon::createFromFormat('d/m/Y H:i:s', $date->format('d/m/Y H:i:s'))->subDays(60);

    // Data falsa do fim do período de inscrição, sendo
    // 5 dias antes da data da maratona
    $ends = Carbon::createFromFormat('d/m/Y H:i:s', $date->format('d/m/Y H:i:s'))->subDays(1);

    return [
        'title' => $faker->city,
        'description' => $faker->text,
        'starts' => $starts->format('d/m/Y H:i:s'),
        'ends' => $ends->format('d/m/Y H:i:s'),
        'date' => $date->format('d/m/Y H:i:s'),
        'team_count' => rand(1, 10),
        'team_members_count' => rand(1, 3)
    ];
});
