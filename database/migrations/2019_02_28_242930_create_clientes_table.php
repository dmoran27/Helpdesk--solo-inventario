<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('telefono')->nullable();
            $table->enum('sexo', ['Femenino', 'Masculino']);    
            $table->string('email')->nullable();
            $table->enum('tipo', ['Tecnico ORTSI', 'Profesor','Administrativo', 'Estudiante','Directivo', 'Otros']);   
            $table->unsignedInteger('dependencia_id'); 
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('clientes');
    }
}
