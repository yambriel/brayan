@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('customer.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Nombre"required value="{{ old('name') }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Apellido</label>
	    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese El Apellido"required value="{{ old('last_name') }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Correo</label>
	    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Correo Electronico"required value="{{ old('email') }}">
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlInput1">Carnet</label>
	    <input type="number" name="carnet" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Numero de Carnet"required value="{{ old('carnet') }}">
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlInput1">Telefono</label>
	    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Numero Telefonico"required value="{{ old('phone') }}"> 
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Extensión</label>
	    <input type="number" name="extension" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Numero de Extensión"required value="{{ old('extension') }}"> 
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{route('customer.index')}}" class="btn btn-primary">Regresar</a>
	</form>
@endsection