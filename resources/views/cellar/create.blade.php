@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('cellar.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
	  <button type="submit" class="badge badge-pill badge-rose">Guardar</button>
	  <a href="{{ URL::previous() }}" class="badge badge-pill badge-rose">Regresar</a>
	</form>
@endsection