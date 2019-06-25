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
class TicketApoyo extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $table = 'ticketapoyos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
           'ticket_id',
           'asunto',
           
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        TicketApoyo::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   
    public function users()
    {
        return $this->BelongsToMany(Tipo::class, 'tipo_id');
    }

        public function ticket()
    {
        return $this->BelongsTo(Ticket::class);
    }
}
    
    

