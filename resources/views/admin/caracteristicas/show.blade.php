@extends('layouts.app')


@section('content')


	<h2>{{$caracteristicas->id}}</h2> 
	<h2>{{$caracteristicas->nombre}}</h2> 
	<h2>{{$caracteristicas->propiedad}}</h2>
	<h2>{{$caracteristicas->user_id}}</h2>


<a href="{{route('caracteristicas.index')}}">Volver</a>
@stop