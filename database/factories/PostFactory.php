<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{ Post, Comment};
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'  =>  $faker->word(),
        'body'   =>  $faker->sentence(),   
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body'   =>  $faker->sentence(),   
    ];
});
