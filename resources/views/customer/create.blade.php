@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('customer.store') }}"  role="form">
      @csrf
		<div class="text-center">
	    	<h3 class="title">Datos del Trabajador </h3>
		</div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('name') }}">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Apellido</label>
	    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('last_name') }}">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Correo</label>
	    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('email') }}">
	  </div>
	   <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Carnet</label>
	    <input type="number" name="carnet" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('carnet') }}">
	  </div>
	   <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Telefono</label>
	    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('phone') }}"> 
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Extensión</label>
	    <input type="number" name="extension" class="form-control" id="exampleFormControlInput1" placeholder=""required value="{{ old('extension') }}"> 
	  </div>
		<div class="text-center">
	    	<h3 class="title">Datos del Vehiculo </h3>
		</div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Modelo</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" placeholder="" required value="{{ old('model') }}">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Placa</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" placeholder="" required value="{{ old('placa') }}">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating">Color</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" placeholder="" required value="{{ old('color') }}">
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{route('customer.index')}}" class="btn btn-primary">Regresar</a>
	</form>

@endsection