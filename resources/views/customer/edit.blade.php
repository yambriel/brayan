@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
@include('layouts.success')
@include('layouts.errors')


	<form id="customers" class="form" method="POST" action="{{ route('customer.update',$customer->id) }}"  role="form">
      @csrf
      @method('PUT')
	  <div class="form-group">
	  	 <style> h7 { color: #000000; } </style>
	    <label for="exampleFormControlInput1"><h7>Nombre</h7></label>
	    <input type="text" name="name" class="form-control" id="name" value="{{$customer->name}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Apellido</h7></label>
	    <input type="text" name="last_name" class="form-control" id="last_name" value="{{$customer->last_name}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Correo</h7></label>
	    <input type="text" name="email" class="form-control" id="email" value="{{$customer->email}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Carnet</h7></label>
	    <input type="number" name="carnet" class="form-control" id="carnet" value="{{$customer->carnet}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Telefono</h7></label>
	    <input type="text" name="phone" class="form-control" id="phone" value="{{$customer->phone}}"required>
	  </div>
	    <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Extensión</h7></label>
	    <input type="number" name="extension" class="form-control" id="extension" value="{{$customer->extension}}"required>
	  </div>

	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ route('customer.index')}}" class="btn btn-primary">Regresar</a>
	</form>
	<script>

	if ($("#customers").length > 0) {
		$("#phone").mask('(0999)9999999').val("{{$customer->phone}}");
		urlcarnet="{{url('/')}}/customer/carnet/"
	    $("#customers").validate({

	    rules: {
		    name: {
		    	notNumber: true,
		        required: true
		    },
		    last_name: {
		    	notNumber: true,
		        required: true
		    },
		    email: {
	            required: true,
	            emailvalid: true,
		 	},
		 	carnet: {
	            required: true,
	            minlength:1,
		    	maxlength:7,
	            carnetvalid: true,
		 	},
		 	phone: {
	            required: true,
	            minlength:13,
		    	maxlength:13,
	            phonevalid: true,
		 	},
		 	extension: {
	            required: true,
	            minlength:3,
		    	maxlength:4,
	            onlynumber: true,
		 	},
	    },
	    messages: {
		    name: {
		        notNumber: "Por favor ingrese solo letras",
		        required: "Por favor ingrese el Nombre",
		    },
		    last_name: {
		        notNumber: "Por favor ingrese solo letras",
		        required: "Por favor ingrese el Nombre",
		    },
	      	email: {
		       required: "Por Favor Ingrese el Correo",
		       emailvalid: "Ingrese un correo valido"
	        },
	        carnet: {
		       required: "Por Favor Ingrese el Carnet",
		        minlength: "El Numero debe contener entre 1 o 7  Digitos",
		    	maxlength: "El Numero debe contener entre 1 o 7 Digitos",
		       carnetvalid: "El Carnet ya existe"
	        },
	        phone: {
			    required: "Por Favor Ingrese el Teléfono",
			    minlength: "El Numero debe contener 11 Digitos",
		    	maxlength: "El Numero debe contener 11 Digitos",
			    phonevalid: "Ingrese un Teléfono con el Formato Valido"
	        },
	        extension: {
			    required: "Por Favor Ingrese la Extensión",
			    minlength: "El Numero debe contener entre 3 o 4  Digitos",
		    	maxlength: "El Numero debe contener entre 3 o 4 Digitos",
			    onlynumber: "Ingrese solo Números"
	        },
	    },
	   });
	}
	</script>
@endsection
