<?php

use Faker\Generator as Faker;

$factory->define(App\Dependencia::class, function (Faker $faker) {
    return [

 			'nombre'=>$faker->unique()->name,
 			'piso' => mt_rand(1,9),
            'edificio_id' => mt_rand(1,9),
            'user_id'=> mt_rand(1,9),

    ];
});
