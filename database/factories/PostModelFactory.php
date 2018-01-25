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
$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    $paragraphs = $faker->paragraphs(rand(3,5), false);
    $text = '';

    foreach ($paragraphs as $paragraph) {
        $text .= '<p>'.$paragraph.'</p>';
    }

    return [
        'title' => $faker->word(rand(2,5), true),
        'description' => $faker->text(160),
        'text' => $text,
        'image' => $faker->imageUrl(800, 600, 'people', true, 'Faker'),
        'author_id' => 1,
        'active' => 1,
        'post_category_id' => rand(1,2),
    ];
});