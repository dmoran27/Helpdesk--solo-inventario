<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerifericosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perifericos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificador')->unique();
             $table->string('nombre');
             $table->unsignedInteger('tipo_id');
             $table->enum('estado',['nuevo', 'remplazado', 'dañado', 'obsoleto']);
              $table->enum('perteneciente', ['si', 'no']);
            $table->string('observacion')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos');
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
        Schema::dropIfExists('perifericos');
    }
}
