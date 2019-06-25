<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Area;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAreasRequest extends FormRequest
{
    /**
     * Determine if the Area is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return \Gate::allows('area_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Area::updateValidation($this);
    }
}
