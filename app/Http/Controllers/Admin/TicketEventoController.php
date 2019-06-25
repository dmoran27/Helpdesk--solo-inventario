<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\TicketEvento;

class TicketEventoController extends Controller{ 

    public function index(){        
        return view('admin.ticketseventos.index');
    }

     public function show(TicketEvento $ticketEvento){
          return view('admin.ticketseventos.views');
    }

    public function create(){
      return view('admin.ticketseventos.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketEvento $ticketEvento){
        
    }

    public function update(Request $request, TicketEvento $ticketEvento){
        
    }

   

    public function destroy(TicketEvento $ticketEvento){
      
    }

    public function massDestroy(Request $request){
       
    }
}
