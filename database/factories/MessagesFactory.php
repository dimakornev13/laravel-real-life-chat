<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\MessageModel::class, function (Faker $faker) {
    do{
        $from = rand(1, 15);
        $to = rand(1, 15);
    } while($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'msg' => $faker->sentence
    ];
});
