<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    //observar cambios en la base de datos
public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    
 public static function storeValidation($request)
    {
        return [
              'title' => [
                'required',
            ]      
        ];
    }
//validacion al actualizar
    public static function updateValidation($request)
    {
        return [
            'title' => [
                'required',
            ]
            
        ];
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
