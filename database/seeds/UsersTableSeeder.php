<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
       
         factory(App\User::class,10)->create();
        $users = [
            
            [ 'nombre'=> 'Diana',
                    'apellido'=> 'Moran',
                    'cedula'=> '27368169',
                    'telefono'=> '123456',
                    'sexo'=> 'Femenino',
                    'area_id'=> 1,                     
                    'email'=>'dianacmoran27@gmail.com',
                    'password'=>bcrypt('123123'),
                    'remember_token' => str_random(10),
                    'created_at'     => '2019-04-15 19:13:32',
                    'updated_at'     => '2019-04-15 19:13:32',
                    'deleted_at'     => null,
                        ]

        ];

        
        User::insert($users);
    }
}
