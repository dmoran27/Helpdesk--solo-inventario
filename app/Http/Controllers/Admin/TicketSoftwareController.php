<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\TicketSoftware;

class TicketSoftwareController extends Controller{ 

    public function index(){        
        return view('admin.ticketssoftwares.index');
    }

     public function show(TicketSoftware $ticketSoftware){
        return view('admin.ticketssoftwares.views');
    }

    public function create(){
      return view('admin.ticketssoftwares.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketSoftware $ticketSoftware){
        
    }

    public function update(Request $request, TicketSoftware $ticketSoftware){
        
    }

   

    public function destroy(TicketSoftware $ticketSoftware){
      
    }

    public function massDestroy(Request $request){
       
    }
}
