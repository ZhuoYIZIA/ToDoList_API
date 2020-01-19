<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\todo_list;
use Faker\Generator as Faker;

$factory->define(todo_list::class, function (Faker $faker) {
    return [
        'content' => $faker->text(50),
        'isDone' => $faker->boolean,
    ];
});
