<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dependencia extends Model
{
    use SoftDeletes; //Implementamos 

//campos de la tabla dependencia
    protected $dates = ['deleted_at'];
    protected $table = 'dependencias';
    protected $fillable = [
           'nombre',
            'piso',
            'edificio_id',
            'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Dependencia::observe(new \App\Observers\UserActionsObserver);
    }
//relaciones entre tablas
   public function clientes(){
        return $this->HasMany(Cliente::class);
    }
    public function equipos(){
        return $this->HasMany(Equipo::class);
    }
     public function edificio()
    {
        return $this->BelongsTo(Edificio::class);
    }
     public function user()
    {
        return $this->BelongsTo(User::class);
    }
     
    

}
