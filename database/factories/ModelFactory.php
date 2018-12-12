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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->text,
        'slug'        => $faker->slug,
        'template'    => 'default',
        'the_content' => json_encode($faker->paragraph)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->word,
        'slug'          => $faker->slug,
        'the_content'   => json_encode('[string: ' . $faker->paragraph . ']'),
        'the_excerpt'   => json_encode('[string: ' . $faker->paragraph . ']'),
        'preview_image' => $faker->word,
        'full_image'    => $faker->word,
    ];
});
