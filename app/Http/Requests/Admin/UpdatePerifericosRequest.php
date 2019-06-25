<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Periferico;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePerifericosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('periferico_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Periferico::updateValidation($this);
    }
}
