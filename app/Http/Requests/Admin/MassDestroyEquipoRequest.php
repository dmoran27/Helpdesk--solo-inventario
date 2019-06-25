<?php

namespace App\Http\Requests\Admin;


use App\Equipo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyEquipoRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('equipo_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:equipos,id',
        ];
    }
}
