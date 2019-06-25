<?php

namespace App\Http\Requests\Admin;


use App\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDependenciaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('dependencia_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dependencias,id',
        ];
    }
}
