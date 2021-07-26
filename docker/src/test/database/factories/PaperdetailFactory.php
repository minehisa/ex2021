<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paperdetail;
use Faker\Generator as Faker;

// https://github.com/fzaninotto/Faker#fakerprovideruuid
$factory->define(App\Models\Paperdetail::class, function (Faker $faker) {
  return [
    'paperid' => $faker->unique()->numberBetween($min = 1, $max = 100),
    'papername' => $faker->text($maxNbChars = 50),
    'author' => $faker->name,
    'journal' => $faker->company,
    'yearofpublic' => $faker->year,
    'paperpdf' => $faker->text,
  ];
});
