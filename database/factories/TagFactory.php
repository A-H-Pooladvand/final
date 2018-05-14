<?php

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

    return [
        'title' => $faker->realText(20),
        'slug' => $faker->slug(1)
    ];

});