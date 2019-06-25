<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaPerifericoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_periferico', function (Blueprint $table) {
               $table->unsignedInteger('caracteristica_id');
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas');
             $table->unsignedInteger('periferico_id');
            $table->foreign('periferico_id')->references('id')->on('perifericos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristica_periferico');
    }
}
