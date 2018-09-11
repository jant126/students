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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $date_time = $faker->date() . " " . $faker->time();
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
       // 'password' =>  bcrypt('secret'),
        //123456:$2y$10$WhMjBDESE6aX8rVP01qIPOQARtwcB89p.ni/2BrS.e00/M8lso9Ma
        //123456:$2y$10$L7dxQnMf/uNY2.oLfjDR.OUQzshQEJcMJ9ewbaPxSPgg8aC/is3pu
            //'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'is_admin' => false,
        'remember_token' => str_random(10),
        'created_at' =>$date_time,
        'updated_at' => $date_time,
        'phone' => $faker->phoneNumber,
        'role' => "教师用户",
        'creator_id'=> 1
    ];
});
