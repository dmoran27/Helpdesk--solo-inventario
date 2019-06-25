<?php

namespace App\Http\Requests\Admin;

use App\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTicketRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('ticket_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tickets,id',
        ];
    }
}
