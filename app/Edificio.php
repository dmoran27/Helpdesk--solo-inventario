<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Edificio extends Model
{
    //
use SoftDeletes; //Implementamos 

//campos de la tabla en la base de datos
    protected $dates = ['deleted_at'];
    protected $table = 'edificios';
    protected $fillable = [
    'nombre',
    'user_id',
    ];
//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();
       Edificio::observe(new \App\Observers\UserActionsObserver);
    }

//relacion de las tablas en la base de datos 
    public function departamentos(){
    	return $this->HasMany(Departamento::class);
    }

     public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
