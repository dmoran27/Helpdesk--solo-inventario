<?php
namespace App\Http\Requests\Admin;
use Gate;
use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('ticket_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Ticket::updateValidation($this);
    }
}
