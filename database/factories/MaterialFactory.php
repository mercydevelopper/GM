<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [

        'name' => $faker->title,
        'num_s' => $faker->numerify('##########'),
        'price' => $faker->numerify('#######'),
        'qte' => $faker->numerify('##'),
        'img' => $faker->imageUrl($width = 640, $height = 480),
        'category_id' => factory(App\Category::class),
        'provider_id' => factory(App\Provider::class),
        'location_id' => factory(App\Location::class),

    ];
});
