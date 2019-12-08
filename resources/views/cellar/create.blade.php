@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('cellar.store') }}"  role="form" id="sotano">
      @csrf
	  	<div class="form-group">
	  		<style> h7 { color: #000000; } </style>
		    <label for="exampleFormControlInput1"><h7>Nombre del Sótano:</h7></label>
		    <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese el nombre del Sotano" required value="{{ old('name') }}">
		</div>
		<div class="form-group">
		    <label for="exampleFormControlInput1"><h7>Cantidad de Puestos:</h7></label>
		    <input type="number" name="cantidadPuestos" min="1" max="99" class="form-control" id="cantidadPuestos" placeholder="Ingrese la cantidad de puestos que contiene el Sotano" required value="{{ old('cantidadPuestos') }}">
		</div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{ route('cellar.index')}}" class="btn btn-primary">Regresar</a>
	</form>  
	<script>
		
if ($("#sotano").length > 0) {
	    $("#sotano").validate({

	    rules: {
		    name: {
		    	required: true,
	            alphanumber: true,
		    },
		    cantidadPuestos: {
	            required: true,
	            minlength:1,
		    	maxlength:100,
	            onlynumber: true,
		    },
	    },
	    messages: {
		    name: {
		        required: "Por Favor Ingrese el Nombre del Sótano",
	            alphanumber: "Ingrese un Nombre del Sótano Valido",
		    },
	        cantidadPuestos: {
			    required: "Por Favor Ingrese la Cantidad de Puestos que Posee el Sótano ",
			    minlength: "El Numero debe contener entre 1 o 100  Digitos",
		    	maxlength: "El Numero debe contener entre 1 o 100 Digitos",
			    onlynumber: "Ingrese solo Números" 
	    	},
	    },
	   });
	};

	</script>
@endsection