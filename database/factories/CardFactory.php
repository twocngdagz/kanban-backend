<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'description' => $faker->sentence,
        'order' => $faker->numberBetween(1, 20)
    ];
});
