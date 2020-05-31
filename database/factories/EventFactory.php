<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {

    $start_date = $faker->dateTimeBetween('+0 days', '+1 month');
    $end_date = $faker->dateTimeBetween($start_date, $start_date->modify('+5 hours'));


    return [
        'name' => $faker->name,
        'intro' => $faker->name,
        'detail' => $faker->text,
        'status' => $faker->numberBetween(0,2),
        'start_time' => $start_date,
        'end_time' => $end_date,
        'chairman' => $faker->name,
        'place' => $faker->country,
        'max_register' => $faker->numberBetween(0,20),

    ];
});
