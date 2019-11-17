@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

<form id="customers" class="form" method="POST" action="{{ route('customer.store') }}"  role="form">
      @csrf
		<div class="text-center">
	    	<h3 class="title">Datos del Trabajador </h3>
		</div>
	  <div class="form-group bmd-form-group">
	  	 <style> h7 { color: #000000; } </style>
	    <label class="bmd-label-floating"><h7>Nombre</h7></label>
	    <input type="text" name="name" class="form-control" id="name" placeholder="">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Apellido</h7></label>
	    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Correo</h7></label>
	    <input type="text" name="email" class="form-control" id="email" placeholder="">
	  </div>
	   <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Carnet</h7></label>
	    <input type="number" name="carnet" class="form-control" id="carnet" placeholder="">
	  </div>
	   <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Telefono</h7></label>
	    <input type="text" name="phone" class="form-control" id="phone">
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Extensión</h7></label>
	    <input type="number" name="extension" class="form-control" id="extension" maxlength="4" placeholder="">
	  </div>
		<div class="text-center">
	    	<h3 class="title">Datos del Vehiculo </h3>
		</div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Modelo<h7></label>
	    <input type="text" name="model" class="form-control" id="model"
	    placeholder="" >
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Placa</h7></label>
	    <input type="text" name="placa" class="form-control" id="placa" placeholder="" >
	  </div>
	  <div class="form-group bmd-form-group">
	    <label class="bmd-label-floating"><h7>Color</h7></label>
	    <input type="text" name="color" class="form-control" id="color" placeholder="">
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{route('customer.index')}}" class="btn btn-primary">Regresar</a>
	</form>
	<script>

	if ($("#customers").length > 0) {
		$("#phone").unmask().mask('(0999)9999999')
		urlcarnet="{{url('/')}}/customer/carnet/"
		urlplaca="{{url('/')}}/customer/placa/"
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
		 	model: {
	            required: true,
	            alphanumber: true,
		 	},
		 	placa: {
	            required: true,
	            placavalid: true,
		 	},
		 	color: {
		    	notNumber: true,
		        required: true
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
	        model: {
	            required: "Por Favor Ingrese el Modelo",
	            alphanumber: "Ingrese un Modelo Valido",
		 	},
		 	placa: {
	            required: "Por Favor Ingrese la Placa",
	            placavalid: "La Placa ya se Encuentra Registrada",
		 	},
		 	color: {
		        notNumber: "Por favor ingrese solo letras",
		        required: "Por favor ingrese el Color",
		    },
	    },
	   });
	}
	</script>
@endsection


