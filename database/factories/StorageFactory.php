<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Storage;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Storage::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'idCategory' => 1,
        'price' => $faker->randomDigit*10000,
        'total' => $faker->randomDigit,
    ];
});
