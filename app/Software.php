<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Software extends Model
{
    //
    use SoftDeletes; //Implementamos 

//datos en la tabla de software
    protected $dates = ['deleted_at'];
    protected $table = 'softwares';
    protected $fillable = [
    'nombre',
    'tipo_id',
    'descripcion',
    'user_id',
    ];

//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();
        Software::observe(new \App\Observers\UserActionsObserver);
    }
//relacion entre las tablas en la base de datos

public function tipo()
    {
        return $this->BelongsTo(Tipo::class, 'tipo_id');
    }
       public function ticketSoftwares()
    {
        return $this->BelongsToMany(TicketSoftware::class);
    }
}



