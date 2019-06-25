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
class TicketSoftware extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $dates = ['deleted_at'];
    protected $table = 'ticketsoftwares';
    protected $fillable = [
        'ticket_id',
        'causa',
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        TicketSoftware::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   
   
        public function ticket()
    {
        return $this->BelongsTo(Ticket::class);
    }
     public function softwares()
    {
        return $this->BelongsToMany(Software::class);
    }
     public function equipos()
    {
        return $this->BelongsToMany(Equipo::class);
    }
    
    
}
