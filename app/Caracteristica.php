<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Caracteristica extends Model
{
    //
    use SoftDeletes; //Implementamos 

    
//campos de la tabla en la base de datos
    protected $dates = ['deleted_at'];
    protected $table = 'caracteristicas';
    protected $fillable = [
    'nombre',
    'propiedad',
    'user_id',
    ];

//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Caracteristica::observe(new \App\Observers\UserActionsObserver);
    }
//relaciones entre tablas
    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function perifericos(){
    	return $this->BelongsToMany(Periferico::class);
    }

	public function equipos(){
    	return $this->BelongsToMany(Equipo::class);
    }
    
    public function softwares(){
    	return $this->BelongsToMany(Software::class);
    }
}
