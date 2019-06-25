<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
       'nombre' => $faker->name,
            'apellido' => $faker->firstName,
            'cedula' => mt_rand(10000000,99999999),
            'telefono' => $faker->phoneNumber,
            'area_id'=> $faker-> randomElement(['1', '2']),
            'sexo' => $faker-> randomElement(['Femenino', 'Masculino']),
            'email' => $faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // 
            'remember_token' => str_random(10),
    ];
});
