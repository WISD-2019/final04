<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Leave;

$factory->define(Leave::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomDigitNot(0),
        'type'=>$faker->randomElement($array = array ('事假','病假','喪假')),
        'reason'=>$faker->paragraph,
        'status'=>$faker->boolean($chanceOfGettingTrue = 50),
        'prove'=>$faker->realText($maxNbChars = 15),
        'apply_time'=>now(),
        'start_time'=>$faker->dateTimeBetween($startDate = '+1 day', $endDate = '+3 day', $timezone = null),
        'end_time'=>$faker->dateTimeBetween($startDate = '+2 day', $endDate = '+5 day', $timezone = null),
    ];
});
