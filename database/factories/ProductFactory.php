<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
            'category_id' => app\Category::inRandomOrder()->first()->id,
            'name' => $faker->sentence(3),
            'price' => $faker->numberBetween(999, 9999),
            'description' => $faker->paragraph(5),
            'amount' =>$faker->numberBetween(5,100)
    ];
});
