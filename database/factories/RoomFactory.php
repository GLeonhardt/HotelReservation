<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'room_identifier' => $faker->word,
        'stars' => $faker->numberBetween($min = 1, $max = 5),
        'hotel_id' => factory(\App\Hotel::class),
    ];
});
