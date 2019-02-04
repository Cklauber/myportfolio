<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $title = $faker->company;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->sentence,
        'created_by' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
