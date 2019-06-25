<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketeventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketeventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objetivo')->nullable();
            $table->string('asunto')->nullable();
            $table->string('acuerdo')->nullable();
            $table->string('implicados')->nullable();
             $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->timestamps();
            $table->softDeletes(); //Nueva línea, para el borrado lógico
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketeventos');
    }
}
