<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Edificio;
use Illuminate\Foundation\Http\FormRequest;

class StoreEdificiosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return abort_if(Gate::denies('edificio_create'), 403, '403 Forbidden') ?? true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Edificio::storeValidation($this);
    }
}
