@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('cellar.store') }}"  role="form">
      @csrf
	  	<div class="form-group">
		    <label for="exampleFormControlInput1">Nombre del Sotano:</label>
		    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el nombre del Sotano" required value="{{ old('name') }}">
		</div>
		<div class="form-group">
		    <label for="exampleFormControlInput1">Cantidad de Puestos:</label>
		    <input type="number" name="cantidadPuestos" min="1" max="99" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la cantidad de puestos que contiene el Sotano" required value="{{ old('cantidadPuestos') }}">
		</div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{ route('cellar.index')}}" class="btn btn-primary">Regresar</a>
	</form>  
@endsection