@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

	<form class="form" method="POST" action="{{ route('car.update',$car->id) }}"  role="form">
      @csrf
      @method('PUT')
      <div class="form-group">
	  	<div class="row">
		  	<div class="col col-lg-2">
		    	<label for="co_cliente">Trabajador</label>
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
	    <label for="exampleFormControlInput1">Modelo</label>
	    <input type="text" name="model" class="form-control" id="exampleFormControlInput1" value="{{$car->model}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Placa</label>
	    <input type="text" name="placa" class="form-control" id="exampleFormControlInput1" value="{{$car->placa}}"required>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Color</label>
	    <input type="text" name="color" class="form-control" id="exampleFormControlInput1" value="{{$car->color}}"required>
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

		});
	</script>
@endsection