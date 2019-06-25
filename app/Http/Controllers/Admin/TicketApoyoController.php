<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\TicketApoyo;

class TicketApoyoController extends Controller{ 

    public function index(){        
         return view('admin.ticketsapoyos.index');
    }

     public function show(TicketApoyo $ticketApoyo){
            return view('admin.ticketsapoyos.views');
    }

    public function create(){
      return view('admin.ticketsapoyos.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketApoyo $ticketApoyo){
        
    }

    public function update(Request $request, TicketApoyo $ticketApoyo){
        
    }

   

    public function destroy(TicketApoyo $ticketApoyo){
      
    }

    public function massDestroy(Request $request){
       
    }
}
