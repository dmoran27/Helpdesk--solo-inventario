<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    use SoftDeletes;

//campos disponibles en la base de datos

    protected $table = 'users';
    protected $sexo = ['Femenino', 'Masculino'];
    protected $fillable = [
           'nombre',
           'apellido',
           'cedula',
           'telefono',
           'sexo',          
           'area_id',  
           'email',
           'password',
           'remember_token'
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];
     protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

//observar cambios en la base de datos
public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    
    
    /**
     * Hash password
     * @param $input
     */
   public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }
    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function areas(){
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function ticketsApoyos(){
        return $this->belongsToMany(TicketApoyo::class);
    }
     public function tickets()
    {
        return $this->HasMany(Ticket::class);
    }
     public function perifericos()
    {
        return $this->HasMany(Periferico::class);
    }
     public function caracteristicas()
    {
        return $this->HasMany(Caracteristica::class);
    }
     public function tipos()
    {
        return $this->HasMany(Tipo::class);
    }

     public function equipos()
    {
        return $this->HasMany(Equipo::class);
    }
    public function softwares()
    {
        return $this->HasMany(Software::class);
    }
    public function clientes()
    {
        return $this->HasMany(Cliente::class);
    }
     public function dependencias()
    {
        return $this->HasMany(Dependencia::class);
    }
     public function edificios()
    {
        return $this->HasMany(Edificio::class);
    }   
    





}
