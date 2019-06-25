<?php

use Faker\Generator as Faker;

$factory->define(App\Periferico::class, function (Faker $faker) {
    return [

    	'nombre'=>$faker->name,
    		'identificador'=> str_random(18),
        'estado'=> $faker->randomElement(['nuevo', 'remplazado', 'dañado', 'obsoleto']),
        'perteneciente'=> $faker->randomElement(['no', 'si']),
        'observacion'=>$faker->sentence,
        'user_id'=> mt_rand(1,9),
        'tipo_id'=> mt_rand(1,9),

        //
    ];
});
