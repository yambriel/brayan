@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
@include('layouts.success')
@include('layouts.errors')


	<form class="form" method="POST" action="{{ route('customer.update',$customer->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	  	 <style> h7 { color: #000000; } </style>
	    <label for="exampleFormControlInput1"><h7>Nombre</h7></label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$customer->name}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Apellido</h7></label>
	    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="{{$customer->last_name}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Correo</h7></label>
	    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{$customer->email}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Carnet</h7></label>
	    <input type="number" name="carnet" class="form-control" id="exampleFormControlInput1" value="{{$customer->carnet}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Telefono</h7></label>
	    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$customer->phone}}"required>
	  </div>
	    <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Extensión</h7></label>
	    <input type="number" name="extension" class="form-control" id="exampleFormControlInput1" value="{{$customer->extension}}"required>
	  </div>
	 
	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ route('customer.index')}}" class="btn btn-primary">Regresar</a>
	</form>
@endsection