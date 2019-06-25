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
class TicketEquipo extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $table = 'ticketequipos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
           'ticket_id',
           'equipo_id',
           'afalla',
           'falla'
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        TicketEquipo::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   
   
    public function equipo()
    {
        return $this->BelongsTo(Equipo::class);
    }
  
    public function ticket()
    {
        return $this->BelongsTo(Ticket::class);
    }

    
    
}
