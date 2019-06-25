<?php

namespace App\Http\Requests\Admin;


use App\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyClienteRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('cliente_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clientes,id',
        ];
    }
}
