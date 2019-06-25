<?php

use Faker\Generator as Faker;

$factory->define(App\Software::class, function (Faker $faker) {
    return [
        
            'nombre'=>$faker->name,
         	
              'descripcion'=>$faker->sentence,
              'user_id'=> mt_rand(1,9),
              'tipo_id'=> mt_rand(1,9),
              'tipo_id'=> mt_rand(1,9),
    ];
});
