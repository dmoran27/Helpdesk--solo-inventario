<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
            'identificador'=> str_random(18),
            'tipo_id'=>mt_rand(1,9),
            'estado'=> $faker->randomElement(['Abierto','Cerrado','En espera']),
            'accion'=> $faker->randomElement(['Solventado','Revisado','Sin Solucion','Sin Revisar']),
            'prioridad'=> $faker->randomElement(['Alta','Media','Baja']),
            'traslado_servicio'=> $faker->randomElement(['Si','No']),
            'traslado_ticket'=> $faker->randomElement(['Si','No']),
            'observacion'=>$faker->sentence,
            'tiempo_i'=>$faker->date('yyy-mm-dd'),
            'tiempo_c'=>$faker->date('yyy-mm-dd'), 
                    
            'cliente_id'=>mt_rand(1,9),
            'user_id_creador'=>mt_rand(1,9),
            'user_id_asignado'=>mt_rand(1,9),
    ];
});
