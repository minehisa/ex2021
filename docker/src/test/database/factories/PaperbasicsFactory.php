<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paperbasics;
use Faker\Generator as Faker;

$factory->define(App\Models\Paperbasics::class, function (Faker $faker) {
  return [
    'id' => $faker->numberBetween($min = 1, $max = 100),
    // 'updatetime' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
    // 'regittime' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
  ];
});
