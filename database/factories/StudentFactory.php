<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use App\Study;

$factory->define(User::class, function (Faker $faker) {
    $pictures = [
    'img/person1.jpg',
    'img/person2.jpg',
    'img/person3.jpg',
    'img/person4.jpg',
    ];
    return [
        'firstname' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'img_path' => $faker->randomElement($pictures),
        'phone' => $faker->e164PhoneNumber,
        'adress_road' => $faker->streetName,
        'adress_commune' => $faker->city,
        'confirmed' => 1,
    ];
});

$factory->state(User::class, 'student', function (Faker $faker) {
    return [
        'domain_id' => $faker->numberBetween(1,Study::all()->count()),
        'domain_type' => 'App\Study',
    ];
});