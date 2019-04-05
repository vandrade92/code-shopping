<?php

use Faker\Generator as Faker;

$factory->define(CodeShopping\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'price' => $faker->randomNumber(2),
    ];
});
