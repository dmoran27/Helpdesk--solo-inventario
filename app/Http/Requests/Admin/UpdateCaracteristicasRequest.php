<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Caracteristica;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCaracteristicasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {return \Gate::allows('caracteristica_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Caracteristica::updateValidation($this);
    }
}
