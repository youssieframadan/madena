<?php

use Faker\Generator as Faker;

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

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' =>               $faker->name,
//         'email' =>              $faker->unique()->safeEmail,
//         'gender' =>             $faker->numberBetween(10,50),
//         'age' =>                $faker->numberBetween(10, 50),
//         'phone_number' =>       $faker->unique()->numberBetween(10, 50),
//         'user_type_id' =>       $faker->numberBetween(1,3),
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//         'user_type_id' =>       3,
//     ];
// });
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_title' =>           str_random(10),
        'product_type_id' =>         $faker->numberBetween(1,4),
        'product_category_id' =>     $faker->numberBetween(1,2),
        'product_description' =>     str_random(100),
        'product_price_presale' =>   $faker->numberBetween(100.00,500.00),
        'product_price_postsale' =>  $faker->numberBetween(100.00,500.00),
        'product_sale' =>            $faker->numberBetween(0,1),
        'store_id' =>                1,
    ];
});