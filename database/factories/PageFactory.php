<?php

use Faker\Generator as Faker;

$factory->define(App\Page::class, function (Faker $faker) {
    $title = $faker->company;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'is_public' => false,
        'is_in_navbar' => false,
        'content' => implode(" ", $faker->paragraphs),
        'status' => 'posted',
        'owner_id' => function () {
            return auth()->user()->id ?? factory('App\User')->create()->id;
        }
    ];
});
