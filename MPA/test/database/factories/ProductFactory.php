<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName,
        'description' => $faker->text($maxNbChars = 250),
        'price' => $faker->numerify('##'),
        'quantity' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});