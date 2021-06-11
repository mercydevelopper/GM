<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
       

            'name' => $faker->name,
            'email' =>  $faker->unique()->safeEmail,
            'address' => $faker->address,
            'tel' =>$faker->phoneNumber,
            'img' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
