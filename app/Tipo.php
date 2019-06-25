<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tipo extends Model
{
    use SoftDeletes;
    //campos de la tabla de la tabla tipos
    protected $dates = ['deleted_at'];
    protected $table = 'tipos';
    protected $tipo = ['Equipo', 'Software','Periferico','Componente','TicketEquipo','TicketApoyo','TicketSoftware','TicketPeriferico','TicketAdiestramiento','TicketEvento'];
    protected $fillable = [
    'nombre',
    'descripcion',
    'tipo',
    'user_id',
    ];
//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Tipo::observe(new \App\Observers\UserActionsObserver);
    }
//Relacion entre tablas de la base de datos
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function perifericos()
    {
        return $this->HasMany(Periferico::class);
    }
 public function softwares()
    {
        return $this->HasMany(Software::class);
    }
    public function equipos()
    {
        return $this->HasMany(Equipo::class);
    }
     public function tickets()
    {
        return $this->HasMany(Ticket::class);
    }




}
