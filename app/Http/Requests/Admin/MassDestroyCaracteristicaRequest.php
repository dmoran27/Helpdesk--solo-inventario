<?php

namespace App\Http\Requests;

use App\Caracteristica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyCaracteristicaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('caracteristica_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:caracteristicas,id',
        ];
    }
}
