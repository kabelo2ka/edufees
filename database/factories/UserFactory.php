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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'slug' => $faker->slug,
        'first_name' => $faker->firstName,
        'second_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'donee' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Donee::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            factory(App\User::class)->create();
        },
        'id_number' => $faker->randomNumber(),
        'dob' => $faker->date(),
        'enum' => $faker->randomElement(['m', 'f']),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'province' => app(\App\Donee::class)->provinces->pluck('id'),
        'id_filename' => $faker->file(),
        'matric_results_filename' => $faker->file(),
        'about' => $faker->paragraphs(2, true),

        'active' => $faker->boolean,
        'verified' => $faker->boolean,
    ];
});

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'donee_id' => function() {
            factory(App\User::class)->create();
        },
        'slug' => $faker->slug,
        'name' => $faker->words(3, true),
        'fee' => $faker->numberBetween(8000, 100000),
        'institution_name' => $faker->company,
        'campus' => $faker->city,
        'qualification' => $faker->words(3, true),
        'current_study_level' => $level = $faker->numberBetween(0, 6),
        'study_level' => $level + 1,
        'start_date' => $start_date = $faker->year,
        'end_date' => $start_date + 1,
        'goals' => $faker->paragraphs(3, true),
    ];
});


$factory->define(App\Donation::class, function (Faker $faker) {
    $donation = new \App\Donation;
    return [
        'donor_id' => $donor_id = function() {
            return factory(App\User::class)->create()->id;
        },
        'donee_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'course_id' => function() use ($donor_id) {
            return factory(App\Course::class)->create(['user_id' => $donor_id])->id;
        },
        'slug' => $faker->slug,
        'gross_amount' => $gross_amount = (string)$faker->numberBetween(10, 100000),
        'reduction_rate' => $donation->reduction_rate,
        'reduced_amount' => $donation->getReducedAmount($gross_amount),
        'net_amount' => $donation->getNetAmount($gross_amount),
        'comment' => $faker->paragraph
    ];
});
