<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\TicketAdiestramiento;

class TicketAdiestramientoController extends Controller{ 

    public function index(){        
        return view('admin.ticketsadiestramiento.index');
    }

     public function show(TicketAdiestramiento $ticketAdiestramiento){
         return view('admin.ticketsadiestramiento.views');
    }

    public function create(){
      return view('admin.ticketsadiestramiento.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketAdiestramiento $ticketAdiestramiento){
        
    }

    public function update(Request $request, TicketAdiestramiento $ticketAdiestramiento){
        
    }

   

    public function destroy(TicketAdiestramiento $ticketAdiestramiento){
      
    }

    public function massDestroy(Request $request){
       
    }
}
