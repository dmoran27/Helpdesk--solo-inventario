<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return \Gate::allows('user_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'email' => 'email|max:191|required|unique:users,email, id',
            'password' => '',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|string|max:10|unique:users, id',
            'telefono' => 'required|string|max:50',
            'sexo' => 'required',
            'area_id' => 'required|exists:areas,id',];


    }
}
