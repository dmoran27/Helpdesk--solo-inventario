<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Equipo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipoesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return \Gate::allows('equipo_edit'); return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Equipo::updateValidation($this);
    }
}
