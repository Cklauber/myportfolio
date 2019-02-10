<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $title = $faker->company;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->sentence,
        'status' => 'initiated',
        'is_public' => false,
        'repository' => '',
        'is_public_repository' => false,
        'owner_id' => function () {
            return factory('App\User')->create()->id;
        }
    ];
});
