<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_software', function (Blueprint $table) {
              $table->unsignedInteger('caracteristica_id');
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas');
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
        Schema::dropIfExists('caracteristica_software');
    }
}
