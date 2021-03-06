<?php

namespace App\Http\Requests\Admin;

use App\Area;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyAreaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('area_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:areas,id',
        ];
    }
}
