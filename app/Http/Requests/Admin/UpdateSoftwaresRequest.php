<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Software;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSoftwaresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return \Gate::allows('software_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Software::updateValidation($this);



    }
}
