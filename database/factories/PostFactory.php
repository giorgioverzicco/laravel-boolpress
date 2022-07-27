<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'category_id' => \App\Category::inRandomOrder()->first()->id,
        'title' => $faker->sentence(),
        'content' => $faker->realText(),
        'published' => $faker->boolean
    ];
});
