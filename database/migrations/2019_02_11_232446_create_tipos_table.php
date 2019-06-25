<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nombre');
             $table->text('descripcion');
             $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
             $table->enum('tipo', ['Equipo', 'Software','Periferico','Componente','TicketEquipo','TicketApoyo','TicketSoftware','TicketPeriferico','TicketAdiestramiento','TicketEvento']);   
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
        Schema::dropIfExists('tipos');
    }
}
