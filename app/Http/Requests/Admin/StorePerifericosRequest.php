<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Periferico;
use Illuminate\Foundation\Http\FormRequest;

class StorePerifericosRequest extends FormRequest
{
    /**
     * Determine if the Periferico is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abort_if(Gate::denies('periferico_create'), 403, '403 Forbidden') ?? true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Periferico::storeValidation($this);
    }
}
