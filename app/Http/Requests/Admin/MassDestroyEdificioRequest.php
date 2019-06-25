<?php

namespace App\Http\Requests\Admin;
;

use App\Edificio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyEdificioRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('edificio_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:edificios,id',
        ];
    }
}
