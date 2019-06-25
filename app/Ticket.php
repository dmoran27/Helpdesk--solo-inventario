<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ticket extends Model
{
    //
    use SoftDeletes; //Implementamos 

//campos de la tabla ticket
    protected $dates = ['deleted_at'];
    protected $table = 'tickets';
    protected $estado =['Abierto','Cerrado','En espera'];
    protected $accion=['Solventado','Revisado','Sin Solucion','Sin Revisar'];
    protected $prioridad=['Alta','Media','Baja'];
    protected $traslado_servicio=['no','si'];
    protected $traslado_ticket=['no','si'];
    protected $fillable = [
            'identificador',
            'tipo_id',
            'estado',
            'accion',
            'prioridad',
            'observacion',
            'tiempo_i',
            'tiempo_c',
            'user_id_creador',
            'user_id_asignado',
            'lugar',
            'traslado_servicio',
            'traslado_ticket',
            'cod_traslado',
            'cliente_id'
    ];


//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Ticket::observe(new \App\Observers\UserActionsObserver);
    }

    //--------------------------------------------------------------
    
        public function tipo()
    {
        return $this->BelongsTo(Tipo::class);
    }

     public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function cliente()
    {
        return $this->BelongsTo(Cliente::class);
    }

    //------------------------------------------------
    
      public function ticketAdiestramiento()
    {
        return $this->hasOne(TicketAdiestramiento::class);
    }

      public function ticketApoyo()
    {
        return $this->hasOne(TicketApoyo::class);
    }

      public function ticketSoftware()
    {
        return $this->hasOne(TicketSoftware::class);
    }

      public function ticketEvento()
    {
        return $this->hasOne(TicketEvento::class);
    }

      public function ticketEquipo()
    {
        return $this->hasOne(TicketEquipo::class);
    }

      public function ticketPeriferico()
    {
        return $this->hasOne(TicketPeriferico::class);
    }
   
}
