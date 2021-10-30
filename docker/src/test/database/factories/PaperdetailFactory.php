<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paperdetail;
use App\Models\Paperbasics;
use Faker\Generator as Faker;


// https://github.com/fzaninotto/Faker#fakerprovideruuid
$factory->define(App\Models\Paperdetail::class, function (Faker $faker) {
  static $order = 1;
  return [
    'papername' => $faker->text($maxNbChars = 50),
    'author' => $faker->name,
    'journal' => $faker->company,
    'yearofpublic' => $faker->year,
    'volume' => $faker->randomNumber(2),
    'pages' => $faker->randomNumber(2),
    'publisher' => $faker->realText(20),
    'paperpdf' => $faker->text(30),
  ];
});
