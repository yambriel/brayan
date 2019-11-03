@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('post.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Numero del Puesto</label>
	    <input type="text" name="number" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el numero del Puesto"required>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
	</form>
@endsection