<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence(5),
        'content' => $this->faker->text,
        'image' => $this->faker->imageUrl(),
        'like' => random_int(1, 500),
        'is_published' => 1,
        'category_id' => Category::get()->random()->id,
    ];
});
