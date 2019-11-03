@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('customer.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Nombre"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Apellido</label>
	    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese El Apellido"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Correo</label>
	    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Correo Electronico"required>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlInput1">Carnet</label>
	    <input type="text" name="carnet" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Numero de Carnet"required>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlInput1">Telefono</label>
	    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese Su Numero Telefonico"required>
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
	</form>
@endsection