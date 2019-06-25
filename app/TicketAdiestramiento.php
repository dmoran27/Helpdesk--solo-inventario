<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * 
*/
class TicketAdiestramiento extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $table = 'ticketadiestramientos';
    protected $dates = ['deleted_at'];
    protected $fillable = [

           'ticket_id',
           'asunto',
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        TicketAdiestramiento::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   


        public function ticket()
    {
        return $this->BelongsTo(Ticket::class);
    }



    
    
}
