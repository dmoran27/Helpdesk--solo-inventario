<?php

namespace App\Http\Requests\Admin;

use App\Periferico;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPerifericoRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('periferico_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perifericos,id',
        ];
    }
}
