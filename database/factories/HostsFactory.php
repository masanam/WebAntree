<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Hosts;
use Faker\Generator as Faker;

$factory->define(Hosts::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'contact' => $faker->word,
        'email' => $faker->word,
        'phone' => $faker->word,
        'address' => $faker->text,
        'city' => $faker->word,
        'photo' => $faker->word,
        'description' => $faker->text,
        'categoryId' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
