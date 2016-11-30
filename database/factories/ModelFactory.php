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
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'password' => $password ?: $password = bcrypt('password'),
        'reg_id' => $faker->randomNumber(7),
        'status' => $faker->boolean,
    ];
});


$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
	$localisedFaker = Faker\Factory::create("en_AU");
    return [
    	'name' => $faker->company,
        'address' => $localisedFaker->streetAddress,
        'suburb' => $localisedFaker->city,
        'postcode' => $localisedFaker->postcode,
        'state' => $localisedFaker->stateAbbr,
        'telephone' => $localisedFaker->phoneNumber,
        'fax' => $localisedFaker->phoneNumber,
    ];
});


$factory->define(App\Doctor::class, function (Faker\Generator $faker) {
    $localisedFaker = Faker\Factory::create("en_AU");
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'clinic_name' => $faker->company,
        'address' => $localisedFaker->streetAddress,
        'suburb' => $localisedFaker->city,
        'postcode' => $localisedFaker->postcode,
        'state' => $localisedFaker->stateAbbr,
        'telephone' => $localisedFaker->phoneNumber,
        'fax' => $localisedFaker->phoneNumber,
        'mobile' => $localisedFaker->phoneNumber,
        'email' => $localisedFaker->email,
        'provider_id' => $faker->randomNumber(7),
    ];
});

