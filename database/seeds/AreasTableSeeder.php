<?php

use Illuminate\Database\Seeder;
use App\Area;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Area::create([

    	'nombre'=>'CAU',
        'descripcion'=>'Coordinacion de atencion a usuarios',
    	]);
          Area::create([

    	'nombre'=>'CPO',
        'descripcion'=>'Coordinacion de produccion y operaciones',
    	]);
    }
}
