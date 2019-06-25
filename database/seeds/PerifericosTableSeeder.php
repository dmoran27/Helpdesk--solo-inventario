<?php

use Illuminate\Database\Seeder;

class PerifericosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Periferico::class,10)->create();
    }
}
