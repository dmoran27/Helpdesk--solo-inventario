<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketperifericosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketperifericos', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedInteger('ticket_id');
              $table->string('falla')->nullable();
            $table->string('afalla')->nullable();
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
        Schema::dropIfExists('ticketperifericos');
    }
}
