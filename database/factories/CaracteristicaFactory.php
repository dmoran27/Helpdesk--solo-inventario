<?php

use Faker\Generator as Faker;

$factory->define(App\Caracteristica::class, function (Faker $faker) {
    return [
        //
        'nombre'=>$faker->randomElement(['puerto', 'modelo','serial','Otros']),
        'propiedad'=>$faker->randomElement(['22', '11','22','222']),
        'user_id'=>mt_rand(1,9),
    ];
});
