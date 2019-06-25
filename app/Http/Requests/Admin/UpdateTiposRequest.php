<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Tipo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTiposRequest extends FormRequest
{
    /**
     * Determine if the Tipo is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return \Gate::allows('tipo_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Tipo::updateValidation($this);
    }
}
