<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->unique()->word,
        'district' => '7423',
        'text' => $faker->unique()->sentence('6',true),
        'status' => $faker->randomElement($array = array ('pending','viewed','completed')),
    ];
});
