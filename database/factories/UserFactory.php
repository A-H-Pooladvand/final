<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'family' => $faker->lastName,
        'username' => $faker->userName,
        'mobile' => $faker->mobileNumber,
        'phone' => $faker->phoneNumber,
        'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = '7224033a',
        'remember_token' => str_random(10),
    ];
});
