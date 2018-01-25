<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Video::class, function (Faker\Generator $faker) {
    $paragraphs = $faker->paragraphs(rand(3,5), false);
    $text = '';

    foreach ($paragraphs as $paragraph) {
        $text .= '<p>'.$paragraph.'</p>';
    }

    return [
        'title' => $faker->sentence(6, true),
        'description' => $text,
        'url' => 'https://www.youtube.com/watch?v=K0bdWBHNT-U',
        'image' => 'http://img.youtube.com/vi/K0bdWBHNT-U/0.jpg',
    ];
});
