<?php

use App\Model;
use Faker\Generator as Faker;
use App\Siswa;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
		'fnama' => $faker->name,
		'user_id' => 1995,
		'lnama' => '',
		'jkelamin' => $faker->randomElement(['L','P']),
		'agama' => $faker->randomElement(['Islam','Katolik','Budha']),
		'alamat' => $faker->state,                             
    ];
});
