<?php

use App\Audible;
use App\Book;
use App\Course;
use App\Event;
use App\News;
use App\Place;
use App\Province;
use App\ProvinceCity;
use App\Slider;
use App\Term;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Place::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'province_id' => $province = $faker->randomElement(Province::pluck('id')->toArray()),
        'province_city_id' => $faker->randomElement(ProvinceCity::where('province_id', $province)->pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'gender' => $faker->randomElement(['male', 'female', 'both']),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'first_address' => $faker->realText(700),
        'second_address' => $faker->realText(700),
        'first_phone' => $faker->phoneNumber,
        'second_phone' => $faker->phoneNumber,
        'map_lat' => 34.63991380839733,
        'map_lng' => 50.87594223022461,
    ];
});

$factory->define(Event::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'province_id' => $province = $faker->randomElement(Province::pluck('id')->toArray()),
        'province_city_id' => $faker->randomElement(ProvinceCity::where('province_id', $province)->pluck('id')->toArray()),
        'place_id' => /*$place = $faker->randomElement(Place::where('province_id', $province)->pluck('id')->toArray()),*/
            1,
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'summary' => $faker->realText(500),
        'content' => $faker->realText(rand(1, 5) * 1000),
        'releases_at' => Carbon::now()->addHour(rand(0, 10)),
        'starts_at' => Carbon::now()->addWeek(rand(5, 10)),
    ];
});

$factory->define(Slider::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'description' => $faker->realText(500),
        'link' => $faker->url,
    ];
});

$factory->define(News::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'status' => $faker->randomElement(['publish', 'draft']),
        'title' => $faker->realText(50),
        'summary' => $faker->realText(500),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'content' => $faker->realText(rand(1, 5) * 1000),
        'publish_at' => Carbon::now()->addHour(rand(0, 10)),
        'expire_at' => Carbon::now()->addWeek(rand(5, 10)),
    ];
});

$factory->define(Audible::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'description' => $faker->realText(rand(1, 5) * 1000),
        'file' => 'files/_test/files/' . rand(1, 3) . '.pdf',
        'sound' => 'files/_test/sounds/' . rand(1, 3) . '.mp3',
        'video' => 'files/_test/videos' . rand(1, 3) . '.mp4',
    ];
});

$factory->define(Course::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'summary' => $faker->realText(500),
        'content' => $faker->realText(rand(1, 5) * 1000),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'file' => 'files/_test/files/' . rand(1, 3) . '.pdf',
    ];
});

$factory->define(Term::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'place_id' => $faker->randomElement(Place::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'summary' => $faker->realText(rand(1, 5) * 1000),
        'description' => $faker->realText(rand(1, 5) * 1000),
        'start_at' => Carbon::now()->addHour(rand(0, 10)),
        'end_at' => Carbon::now()->addWeek(rand(5, 10)),
    ];
});

$factory->define(Book::class, function (Faker $faker) use ($factory) {

    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'title' => $faker->realText(50),
        'description' => $faker->realText(rand(1, 5) * 1000),
        'image' => 'files/_test/' . rand(1, 10) . '.jpg',
        'file' => 'files/_test/files/' . rand(1, 3) . '.pdf',
    ];
});
