<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Caracteristica;
use Illuminate\Foundation\Http\FormRequest;

class StoreCaracteristicasRequest extends FormRequest
{
    /**
     * Determine if the Caracteristica is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return abort_if(Gate::denies('caracteristica_create'), 403, '403 Forbidden') ?? true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Caracteristica::storeValidation($this);
    }
}
