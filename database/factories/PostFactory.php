<?php

use Illuminate\Support\Str;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{ Post, Comment};
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title =   $faker->word();
    return [
        'title'  =>  $title,
        'body'   =>  $faker->sentence(),
        'slug'   =>  Str::slug($title),   
    ];
});

