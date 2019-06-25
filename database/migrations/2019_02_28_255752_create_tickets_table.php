<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('identificador');
            $table->unsignedInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');

            $table->enum('estado',['Abierto','Cerrado','En espera']);
           
            $table->enum('prioridad',['Alta','Media','Baja']); 
            $table->enum('accion',['Solventado','Revisado','Sin Solucion','Sin Revisar']);
           
            $table->text('observacion')->nullable();
           $table->string('tiempo_i');
            $table->string('tiempo_c')->nullable(); 
            $table->text('lugar')->nullable(); 
            $table->enum('traslado_servicio',['Si','No']);
            $table->enum('traslado_ticket',['Si','No']);
            $table->string('cod_traslado')->nullable();
            
            
            $table->unsignedInteger('user_id_asignado');
            $table->unsignedInteger('user_id_creador');
          
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('user_id_asignado')->references('id')->on('users');
            $table->foreign('user_id_creador')->references('id')->on('users');
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
        Schema::dropIfExists('tickets');
    }
}
