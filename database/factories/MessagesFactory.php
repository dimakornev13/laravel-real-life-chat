<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\MessageModel::class, function (Faker $faker) {
    do{
        $from = rand(1, 100);
        $to = rand(1, 100);
    } while($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'msg' => $faker->sentence
    ];
});
