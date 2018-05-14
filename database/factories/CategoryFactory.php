<?php

use App\Audible;
use App\Book;
use App\Category;
use App\Course;
use App\News;
use App\Place;
use App\Event;
use App\Term;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) use ($factory) {

    $classes = [
        Place::class,
        Event::class,
        News::class,
        Audible::class,
        Course::class,
        Term::class,
        Book::class,
    ];

    return [
        'category_type' => $classes[rand(0, (count($classes) - 1))],
        'title' => $faker->realText(50),
        'slug' => $faker->slug(1),
    ];
});
