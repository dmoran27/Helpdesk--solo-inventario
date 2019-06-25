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
class Cliente extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $dates = ['deleted_at'];
    protected $sexo = ['Femenino', 'Masculino'];
    protected $tipo = ['Tecnico ORTSI', 'Profesor','Administrativo', 'Estudiante','Directivo', 'Otros'];
    protected $table = 'clientes';
    protected $fillable = [
           'nombre',
           'apellido',
           'cedula',
           'telefono',
           'sexo',
           'email',
           'tipo',          
           'dependencia_id',
           'user_id',  
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        Cliente::observe(new \App\Observers\UserActionsObserver);
    }
    
    //relacion de las tablas
   
    public function tickets(){
        return $this->HasMany(Ticket::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();;
    }
     public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id')->withTrashed();
    }
    
    
}
