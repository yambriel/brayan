@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('cellar.update',$cellar->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
		    <label for="exampleFormControlInput1">nombre</label>
		    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$cellar->name}}">
	  </div>
	  <div class="form-group">
		    <label for="exampleFormControlInput1">Cantidad de Puestos:</label>
		    <input type="number" name="cantidadPuestos" min="1" max="99" class="form-control" id="exampleFormControlInput1" placeholder="" required value="{{$cellar->cantidadPuestos}}">
		</div>
	  <button type="submit" class="badge badge-pill badge-rose">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection