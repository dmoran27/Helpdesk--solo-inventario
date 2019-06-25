<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Area extends Model
{
    use SoftDeletes; 
    
    //datos de la tala area
    protected $dates = ['deleted_at'];
	protected $table = 'areas';
    protected $fillable = [
     'nombre',
     'descripcion',
    ];
    //observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Area::observe(new \App\Observers\UserActionsObserver);
    }
    //relacion entre las tablas
    public function users()
    {
        return $this->HasMany(User::class);
    }


}
