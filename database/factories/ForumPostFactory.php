<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ForumPost::class, function (Faker $faker) {

    $title = $faker->sentence(rand(3, 7), true);
    $text = $faker->realText(rand(100, 1000));
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'category_id'   =>  rand(1, 11),
        'user_id'       =>  (rand(1, 5) == 5) ? 1 : 2,
        'title'         =>  $title,
        'text'          =>  $text,
        'is_published'  =>  $isPublished,
        'published_at'  =>  $isPublished ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
        'created_at'    =>  $createdAt,
        'updated_at'    =>  $createdAt,
    ];

    return $data;
});
