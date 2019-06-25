<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('telefono')->nullable();
            $table->enum('sexo', ['Femenino', 'Masculino']);          
            $table->unsignedInteger('area_id');  
            $table->foreign('area_id')->references('id')->on('areas');
            $table->string('email')->unique();
            $table->string('password');
            $table->datetime('email_verified_at')->nullable();
            $table->rememberToken()->nullable();;
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
        Schema::dropIfExists('users');
    }
}
