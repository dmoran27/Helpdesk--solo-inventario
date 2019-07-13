<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Cliente;
use App\Equipo;
use App\Periferico;
use App\General;
use App\User;
use App\Tipo;
use App\TicketEquipo;

class TicketEquipoController extends Controller{ 

    public function index(){ 
         return view('admin.ticketsequipos.index');
}


     public function show(TicketEquipo $ticketEquipo){
           return view('admin.ticketsequipos.views');
    }

    public function create(){


        $tipos=Tipo::All()->where('tipo', 'TicketEquipo');
        $estado = General::getEnumValues('tickets','estado'); 
        $traslado_ticket = General::getEnumValues('tickets','traslado_ticket'); 
        $traslado_servicio = General::getEnumValues('tickets','traslado_servicio'); 
        $accion = General::getEnumValues('tickets','accion'); 
        $prioridad = General::getEnumValues('tickets','prioridad');  
        $perifericos = Periferico::all();
        $equipos  = Equipo::all();
        $cliente=Cliente::all();
        $usuarios=User::all();
        return view('admin.ticketsequipos.create', compact( 'tipos','estado', 'traslado_servicio','traslado_ticket', 'accion','prioridad','perifericos', 'equipos','cliente', 'usuarios'));
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
