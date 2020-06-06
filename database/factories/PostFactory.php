<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'user_id'=> random_int(1,8),
        'category_id'=>random_int(1,10),
        'title'=> $faker->realText(20),
        'content'=> $faker->text(50),
        'thumbnail_path'=> $faker->imageUrl(),
    ];
});
