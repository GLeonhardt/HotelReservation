<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'check_in' => $faker->dateTimeBetween('today', '+1 day'),
        'check_out' => $faker->dateTimeBetween('next week', 'next month'),
        'total_price' => $faker->randomFloat(2, 50, 500),
        'user_id' => factory(\App\User::class),

    ];
});
