<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Event::class, function (Faker $faker) {

    $start_date = $faker->dateTimeBetween('+0 days', '+1 month');
    $end_date = $faker->dateTimeBetween($start_date, $start_date->modify('+5 hours'));


    return [
        'e_name' => $faker->name,
        'e_intro' => $faker->name,
        'e_detail' => $faker->text,
        'e_status' => $faker->numberBetween(0,2),
        'e_start_time' => $start_date,
        'e_end_time' => $end_date,
        'e_chairman' => $faker->name,
        'e_place' => $faker->country,
        'e_max_register' => $faker->numberBetween(500,1000),

    ];
});
