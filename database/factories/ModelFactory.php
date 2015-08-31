<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
*/
$factory->define('App\SubjectModel', function ($faker) {

    $s = $faker->randomElements($array = array ('Introduction To Software','Introduction To Architecture','PHP', 'C#','C++', 'System Analysis And Design'));
    return [
        'subject_code' => $faker->numerify('HCS###'),
        'subject_name' => $s[0],
        'subject_category' => $faker->numberBetween($min = 1, $max = 4)
    ];
});