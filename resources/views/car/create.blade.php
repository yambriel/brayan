@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('car.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Modelo</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el Modelo del Vehiculo">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Placa</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la Placa del Vehiculo">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Color</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el Color del Vehiculo">
	  </div>
	  <button type="submit" class="badge badge-pill badge-rose">Guardar</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection