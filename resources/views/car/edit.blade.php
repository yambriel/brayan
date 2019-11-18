@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" id="formCar" method="POST" action="{{ route('car.update',$car->id) }}"  role="form">
      @csrf
      @method('PUT')
      <div class="form-group">
      		<style> h7 { color: #000000; } </style>
	  	<div class="row">
		  	<div class="col col-lg-2">
		    	<label for="co_cliente"><h7>Trabajador</h7></label>
	    	</div>
	   	</div>
	  	<div class="row">
		  	<div class="col col-lg-2">
			    <select id="co_cliente" name="idcustomers" data-placeholder="Elija el Trabajador" class="chosen-select" tabindex="2" style="width: 450px;"required>
			    </select>
	    	</div>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Modelo</h7></label>
	    <input type="text" name="model" class="form-control" id="model" value="{{$car->model}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Placa</h7></label>
	    <input type="text" name="placa" class="form-control" id="placa" value="{{$car->placa}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Color</h7></label>
	    <input type="text" name="color" class="form-control" id="color" value="{{$car->color}}"required>
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ route('car.index')}}" class="btn btn-primary">Regresar</a>
	</form>
	<script>
	$(document).ready(function () {
			var idcustomers = '{{$car->idcustomers}}'
			$.ajax({
				url: "{{url('/')}}/car/customer",
				type: "GET",
				dataType: 'JSON',
				success: function(data) {
					$.each(data, function (i, val){
						$('#co_cliente').append('<option value="'+val.id+'">'+val.carnet+'-'+val.name+' '+val.last_name+'</option>');
					});
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				},
				complete: function(){
					$('#co_cliente').val(idcustomers);
					$('#co_cliente').trigger('chosen:updated');
					$('#co_cliente').chosen({allow_single_deselect:true});
				}
			});
		
	if ($("#formCar").length > 0) {
		urlplaca="{{url('/')}}/customer/placa/"
	    $("#formCar").validate({
		    rules: {
			    
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
});

	</script>
@endsection
