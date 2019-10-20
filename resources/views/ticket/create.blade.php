@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<form class="form" method="POST" action="{{ route('ticket.store') }}"  role="form">
      @csrf
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Cliente</label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Sotano</label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Puesto</label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Carro</label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Hora de entrada</label>
	    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
	  </div>
	</form>
@endsection