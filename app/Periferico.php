<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Periferico extends Model
{
    //
    use SoftDeletes; //Implementamos 
//campos en la tabla periferico
    protected $dates = ['deleted_at'];
     protected $perteneciente= ['si', 'no'];
    protected $estado=['nuevo', 'remplazado', 'dañado', 'obsoleto'];
    protected $table = 'perifericos';
    protected $fillable = [
    'nombre',
    'estado',
    'identificador',
    'perteneciente',
    'observacion',
    'tipo_id',
    'user_id',
    ];

//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();
        Periferico::observe(new \App\Observers\UserActionsObserver);
    }


//relacion entre las tablas de la base de datos
public function caracteristicas(){
    	return $this->BelongsToMany(Caracteristica::class);
    }

public function equipos(){
    	return $this->BelongsToMany(Equipo::class);
    }
public function tipo()
    {
        return $this->BelongsTo(Tipo::class);
    }
}
