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
$factory->define(App\Models\Document::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence(6, true),
        'description' => $faker->paragraph(1),
        'file' => env('APP_URL').'/docs/teste.pdf',
    ];
});
