<?php

use Illuminate\Database\Seeder;
use Caffeinated\shinobi\Models\Rol;

class DependenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Dependencia::class,10)->create();
    	
    }
}
