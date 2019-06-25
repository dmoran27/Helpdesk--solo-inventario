<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            
            $table->string('identificador')->unique();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serial')->nullable();
            $table->enum('estado_equipo',['nuevo', 'remplazado', 'dañado', 'obsoleto']);
            $table->enum('perteneciente', ['si', 'no']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('dependencia_id');
            $table->foreign('dependencia_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->softDeletes(); //Nueva línea, para el borrado lógico
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
