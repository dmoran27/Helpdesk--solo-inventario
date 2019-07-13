<?php

namespace App\Observers;

use Auth;
use App\UserAction;

class UserActionsObserver
{
    public function saved($model)
    {
        if ($model->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'Crear';
        } else {
            // Data was updated
            $action = 'Actualizar';
        }
        if (Auth::check()) {
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => $action,
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }


    public function deleting($model)
    {
        if (Auth::check()) {
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => 'Eliminar',
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }
}