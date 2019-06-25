<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


use App\TicketEquipo;

class TicketEquipoController extends Controller{ 

    public function index(){ 
         return view('admin.ticketsequipos.index');
}
     public function show(TicketEquipo $ticketEquipo){
           return view('admin.ticketsequipos.views');
    }

    public function create(){



      return view('admin.ticketsequipos.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketEquipo $ticketEquipo){
        
    }

    public function update(Request $request, TicketEquipo $ticketEquipo){
        
    }

   

    public function destroy(TicketEquipo $ticketEquipo){
      
    }

    public function massDestroy(Request $request){
       
    }
}
