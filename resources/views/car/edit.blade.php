@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('car.update',$car->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Modelo</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" value="{{$car->model}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Placa</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" value="{{$car->placa}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Color</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value="{{$car->color}}">
	  </div>
	  <button type="submit" class="badge badge-pill badge-rose">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection