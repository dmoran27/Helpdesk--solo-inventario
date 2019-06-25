<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Edificio;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEdificiosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return \Gate::allows('edificio_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Edificio::updateValidation($this);
    }
}
