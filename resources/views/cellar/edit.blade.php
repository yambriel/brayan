@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('cellar.update',$cellar->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	  	<style> h7 { color: #000000; } </style>
		    <label for="exampleFormControlInput1"><h7>nombre</h7></label>
		    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$cellar->name}}"required>
	  </div>
	  <div class="form-group">
		    <label for="exampleFormControlInput1"><h7>Cantidad de Puestos:</h7></label>
		    <input type="number" name="cantidadPuestos" min="1" max="99" class="form-control" id="exampleFormControlInput1" placeholder="" required value="{{$cellar->cantidadPuestos}}"required>
		</div>
	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ Route('cellar.index')}}" class="btn btn-primary">Regresar</a>
	</form>
@endsection