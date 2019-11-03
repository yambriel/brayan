@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('car.store') }}" id="formCar" role="form">
      @csrf
	  <div class="form-group">
	  	<div class="row">
		  	<div class="col col-lg-2">
		    	<label for="co_cliente">Cliente</label>
	    	</div>
	   	</div>
	  	<div class="row">
		  	<div class="col col-lg-2">
			    <select id="co_cliente" name="idcustomers" data-placeholder="Elija el Cliente" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
			    </select>
	    	</div>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Modelo</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el Modelo del Vehiculo" required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Placa</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la Placa del Vehiculo" required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Color</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el Color del Vehiculo" required>
	  </div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
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
								$('#co_cliente').append('<option value="'+val.id+'">'+val.name+' '+val.last_name+'</option>');
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
									.append('No hay clientes registrados')))
						}
					},
					error: function(xhr, textStatus, thrownError) {
						alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
					},
					complete: function(){
						$('#co_cliente').trigger('chosen:updated');
					}
				});
		});

	</script>
@endsection