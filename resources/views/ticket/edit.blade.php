@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('ticket.update',$ticket->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Cliente</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" value=>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Sotano</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" value=>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Puesto</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value=>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Carro</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value=>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Hora de Entrada</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value=>
	  </div>
	  <button type="submit" class="badge badge-pill badge-rose">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection