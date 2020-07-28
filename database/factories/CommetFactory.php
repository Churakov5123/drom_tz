<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Comment;
use Illuminate\Support\Str;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'text' => $faker->text
    ];
});

