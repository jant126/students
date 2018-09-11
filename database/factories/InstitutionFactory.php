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

$factory->define(App\Models\Institution::class, function (Faker $faker) {
    $date_time = $faker->date() . " " . $faker->time();
    return [
        'user_id' => 1,
        'institution_name' => $faker->company,
        'institution_code' => $faker->postcode,
        'institution_content' => $faker->text,
        'institution_address' => $faker->address,
        'institution_legal_person' => $faker->name,
        'created_at' =>$date_time,
        'updated_at' => $date_time
    ];
});