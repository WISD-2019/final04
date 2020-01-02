<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */




use Faker\Generator as Faker;
use App\Leave;

$factory->define(Leave::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomDigit,
        'type'=>$faker->randomElement($array = array ('事假','病假','喪假')),
        'reason'=>$faker->paragraph,
        'stauts'=>$faker->boolean($chanceOfGettingTrue = 50),
        'prove'=>$faker->realText($maxNbChars = 15),
        'start_time'=>$faker->dateTime($max = 'now', $timezone = null),
        'end_time'=>$faker->dateTime($max = 'now', $timezone = null),
    ];
});
