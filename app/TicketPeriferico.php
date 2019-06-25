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
class TicketPeriferico extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $dates = ['deleted_at'];
    protected $table = 'ticketperiferico';
    protected $fillable = [
        'ticket_id',
        'falla',
        'afalla'
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        TicketPeriferico::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   
   
        public function ticket()
    {
        return $this->BelongsTo(Ticket::class);
    }
   
    
    
}
