<?php

use Faker\Generator as Faker;

$factory->define(App\Equipo::class, function (Faker $faker) {
    return [
        //

            'nombre'=>$faker->name,
         	'identificador'=> str_random(18),
            'marca'=> str_random(8),
            'modelo'=> str_random(8),
            'serial'=> str_random(8),
            'estado_equipo'=> $faker->randomElement(['nuevo', 'remplazado', 'dañado', 'obsoleto']),
            'perteneciente'=> $faker->randomElement(['no', 'si']),
              'user_id'=> mt_rand(1,9),
              'tipo_id'=> mt_rand(1,9),
              'dependencia_id'=> mt_rand(1,9),

    ];
});
