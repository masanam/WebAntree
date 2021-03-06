<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Sliders;
use Faker\Generator as Faker;

$factory->define(Sliders::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'image' => $faker->word,
        'orderid' => $faker->randomDigitNotNull,
        'status' => $faker->randomDigitNotNull,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
