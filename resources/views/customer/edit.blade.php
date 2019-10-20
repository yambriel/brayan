@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('customer.update',$customer->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$customer->name}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Apellido</label>
	    <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="{{$customer->last_name}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Correo</label>
	    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{$customer->email}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Carnet</label>
	    <input type="int" name="carnet" class="form-control" id="exampleFormControlInput1" value="{{$customer->carnet}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Telefono</label>
	    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$customer->phone}}">
	  </div>
	  <button type="submit" class="badge badge-pill badge-rose">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection