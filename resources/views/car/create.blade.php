@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')


	<form class="form" method="POST" action="{{ route('car.store') }}" id="formCar" role="form">
      @csrf
	  <div class="form-group">
	  	<style> h7 { color: #000000; } </style>
	  	<div class="row">
		  	<div class="col col-lg-2">
		    	<label for="co_cliente"><h7>Trabajador</h7></label>
	    	</div>
	   	</div>
	  	<div class="row">
		  	<div class="col col-lg-2">
			    <select id="co_cliente" name="idcustomers" data-placeholder="Elija El Trabajador" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
			    <option value=""></option>
			    </select>

	    	</div>
	    </div>
	  </div>
	  <div class="form-group">
	  	 <style> h7 { color: #000000; } </style>
	    <label for="exampleFormControlInput1"><h7>Modelo</h7></label>
	    <input type="text" name="model" class="form-control" id="model" placeholder="Ingrese el Modelo del Vehiculo" required value="{{ old('model') }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Placa</h7></label>
	    <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese la Placa del Vehiculo" required value="{{ old('placa') }}">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1"><h7>Color</h7></label>
	    <input type="text" name="color" class="form-control" id="color" placeholder="Ingrese el Color del Vehiculo" required value="{{ old('color') }}">
	  </div>
	  <button type="submit" class="btn btn-primary validd">Guardar</button>
	  <a href="{{ route('car.index') }}" class="btn btn-primary">Regresar</a>
	</form>
	<script>
		$(document).ready(function () {
			$.ajax({	
					url: "{{url('/')}}/car/customer",
					type: "GET",
					dataType: 'JSON',
					success: function(data) {
						if(data.length >0){
							$.each(data, function (i, val){
								$('#co_cliente').append('<option value="'+val.id+'">'+val.carnet+'-'+val.name+' '+val.last_name+'</option>');
							});
						}else{
							$("#formCar").prepend($("<div>",{"class":"alert alert-danger"})
								.append($("<div>",{"class":"container"})
									.append($("<div>",{"class":"alert-icon"})
										.append($("<i>",{"class":"material-icons"}).text('error_outline')))
									.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
										.append($("<span>",{"aria-hidden":"true"})
											.append($("<i>",{"class":"material-icons"}).text('clear')) ))
									.append($("<b>").text('Error Alert:'))
									.append('No hay Trabajadores registrados')))
						}
					},
					error: function(xhr, textStatus, thrownError) {
						alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
					},
					complete: function(){
						$('#co_cliente').trigger('chosen:updated');
					}
				});
			$('.validd').click(function() {
				if($('#co_cliente').val()==''){
					$("#formCar").prepend($("<div>",{"class":"alert alert-danger"})
								.append($("<div>",{"class":"container"})
									.append($("<div>",{"class":"alert-icon"})
										.append($("<i>",{"class":"material-icons"}).text('error_outline')))
									.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
										.append($("<span>",{"aria-hidden":"true"})
											.append($("<i>",{"class":"material-icons"}).text('clear')) ))
									.append($("<b>").text('Error Alert:'))
									.append('Debe Elegir un Trabajador')))
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