<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => $faker->word,
        'dateOfBirth' => $faker->date('Y-m-d H:i:s'),
        'phone' => $faker->word,
        'address' => $faker->text,
        'city' => $faker->word,
        'gender' => $faker->randomDigitNotNull,
        'remember_token' => $faker->word,
        'blood' => $faker->word,
        'idKtp' => $faker->word,
        'photo' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'roles' => $faker->randomDigitNotNull,
        'login_at' => $faker->date('Y-m-d H:i:s'),
        'login_ip' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
