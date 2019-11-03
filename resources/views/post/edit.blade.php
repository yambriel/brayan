@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('post.update',$post->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Numero de Puesto</label>
	    <input type="text" name="number" class="form-control" id="exampleFormControlInput1" value="{{$post->number}}"required>
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
	</form>
@endsection