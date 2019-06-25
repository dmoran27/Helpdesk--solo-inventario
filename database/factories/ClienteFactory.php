<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        //
       
          'nombre'=>$faker->name,
            'apellido' => $faker->firstName,
            'cedula' => mt_rand(10000000,99999999),
            'telefono' => mt_rand(10000000,99999999),
            'sexo' => $faker-> randomElement(['1', '2']),
            'email' => $faker->unique()->safeEmail,
            'tipo' => $faker->randomElement(['Tecnico ORTSI', 'Profesor','Administrativo', 'Estudiante','Directivo', 'Otros']),
            'dependencia_id'=> mt_rand(1,9),
           'user_id'=> mt_rand(1,9),
    ];
    
});
