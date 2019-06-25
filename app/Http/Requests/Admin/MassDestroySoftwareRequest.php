<?php

namespace App\Http\Requests\Admin;
;

use App\Software;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySoftwareRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('software_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:softwares,id',
        ];
    }
}
