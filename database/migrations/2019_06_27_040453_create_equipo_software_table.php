<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_software', function (Blueprint $table) {
              $table->unsignedInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
             $table->unsignedInteger('software_id');
            $table->foreign('software_id')->references('id')->on('softwares');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_software');
    }
}
