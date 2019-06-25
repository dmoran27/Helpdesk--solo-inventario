<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Equipo extends Model
{
    //
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];
     protected $table = 'equipos';
    protected $perteneciente= ['si', 'no'];
    protected $estado_equipo=['nuevo', 'remplazado', 'dañado', 'obsoleto'];
    protected $fillable = [
           'nombre',    
            'identificador',
            'marca',
            'modelo',
            'serial',
          	'estado_equipo',
            'perteneciente',
            'user_id',
            'tipo_id',
            'dependencia_id'


    ];
    //observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        Equipo::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

  
     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

     public function tipo()
    {
        return $this->BelongsTo(Tipo::class);
    }

    public function perifericos(){
    	return $this->BelongsToMany(Periferico::class);
    }

    public function softwares(){
        return $this->BelongsToMany(Software::class);
    }
    public function caracteristicas(){
    	return $this->BelongsToMany(Caracteristica::class);
    }

    public function ticketSoftwares()
    {
        return $this->BelongsToMany(TicketSoftware::class);
    }
    
     public function ticketEquipos()
    {
        return $this->BelongsToMany(TicketEquipo::class);
    }
}
