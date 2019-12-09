@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

<form class="form" method="POST" action="{{ route('ticket.store') }}" id="formTicket" role="form">
      @csrf
      <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
		<div class="form-group">
			<style> h7 { color: #000000; } </style>
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_cliente"><h7>Trabajador</h7></label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_cliente" name="id_customer" data-placeholder="Elija el Trabajador" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
		</div>
		<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_car"><h7>Vehículo</h7></label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_car" name="car_id" data-placeholder="Elija el vehículo" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    </select>
		    	</div>
		    </div>
	    </div>
		<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_sotano"><h7>Sótano</h7></label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_sotano" name="cellar_id" data-placeholder="Elija el Sótano" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
		</div>
	  	<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_puesto"><h7>Puesto</h7></label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_puesto" name="post_id" data-placeholder="Elija el puesto" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    </select>
		    	</div>
		    </div>
		</div>
	    <div class="form-group">
		   	<label class="label-control"><h7>Fecha y Hora de Entrada</h7></label>
		    <input type="text" name="entry_time" class="form-control datetimepicker" value="
		    {{
		    ((old('entry_time')!= '')?old('entry_time'):date('d-m-Y hh:mm'))
			}}
			"/>

		</div>
	    <div class="form-group">
	    	<div class="form-check">
				<label class="form-check-label">
	                <input class="form-check-input" type="radio" name="systemTimeEntry" id="exampleRadios1" value="AM" {{ (old('systemTimeEntry') != ""?(old('systemTimeEntry') == "AM")?'checked':'':'checked') }}> AM
	                <span class="circle">
	            	    <span class="check"></span>
	                </span>
	            </label>
			</div>
			<div class="form-check">
				<label class="form-check-label">
	                <input class="form-check-input" type="radio" name="systemTimeEntry" id="exampleRadios1" value="PM" {{ (old('systemTimeEntry') == "PM")?'checked':'' }}> PM
	                <span class="circle">
	            	    <span class="check"></span>
	                </span>
	            </label>
			</div>
		</div>

		<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_sotano"><h7>Puerta de Entrada</h7></label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="input_port" name="input_port" data-placeholder="Elija la Puerta de Entrada" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    	<option value="Norte Banesco">Norte Banesco</option>
				    	<option value="Oeste Principal">Oeste Principal</option>
				    	<option value="Sur Libertador">Sur Libertador</option>
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
		</div>
	  <button type="submit" class="btn btn-primary">Guardar</button>
	  <a href="{{route('ticket.index')}}" class="btn btn-primary">Regresar</a>
	</form>


	<script>
		$(document).ready(function () {
			var idcustomer = "{{ old('id_customer') }}"
			var carid = "{{ old('car_id') }}"
			var cellarid = "{{ old('cellar_id') }}"
			var postid = "{{ old('post_id') }}"
			$.ajax({
				url: "{{url('/')}}/ticket/customer",
				type: "GET",
				dataType: 'JSON',
				success: function(data) {
					if(data.length >0){
						$.each(data, function (i, val){
							$('#co_cliente').append('<option value="'+val.id+'">'+val.carnet+'-'+val.name+' '+val.last_name+' </option>');
						});
					}else{
						$("#formTicket").prepend($("<div>",{"class":"alert alert-danger"})
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
					if(idcustomer!=''){
						$('#co_cliente').val(idcustomer);
						$('#co_cliente').change();
					}
					$('#co_cliente').trigger('chosen:updated');
				}
			});
			$('#co_cliente').on('change', function(evt, params) {
				var values = $(this).val();
				$.ajax({
					url: "{{url('/')}}/ticket/car",
					type: "GET",
					data: {ids: values},
					dataType: 'JSON',
					success: function(data) {
						if(data.length >0){
							$.each(data, function (i, val){
								$('#co_car').append('<option class="co_car" value="'+val.id+'">'+val.model+' '+val.color+' '+val.placa+'</option>');
							});
						}else{
							$("#formTicket").prepend($("<div>",{"class":"alert alert-danger"})
								.append($("<div>",{"class":"container"})
									.append($("<div>",{"class":"alert-icon"})
										.append($("<i>",{"class":"material-icons"}).text('error_outline')))
									.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
										.append($("<span>",{"aria-hidden":"true"})
											.append($("<i>",{"class":"material-icons"}).text('clear')) ))
									.append($("<b>").text('Error Alert:'))
									.append('No hay Vehículos registrados')))
							$('.co_car').remove();
							$('#co_car').trigger('chosen:updated');
						}
					},
					error: function(xhr, textStatus, thrownError) {
						alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
					},
					complete: function(){
						if(carid!=''){
							$('#co_car').val(carid);
						}
						$('#co_car').trigger('chosen:updated');
					}
				});
			});
			$.ajax({
				url: "{{url('/')}}/ticket/cellar",
				type: "GET",
				dataType: 'JSON',
				success: function(data) {
					if(data.length >0){
						$.each(data, function (i, val){
							$('#co_sotano').append('<option value="'+val.id+'">'+val.name+'</option>');
						});
					}else{
						$("#formTicket").prepend($("<div>",{"class":"alert alert-danger"})
							.append($("<div>",{"class":"container"})
								.append($("<div>",{"class":"alert-icon"})
									.append($("<i>",{"class":"material-icons"}).text('error_outline')))
								.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
									.append($("<span>",{"aria-hidden":"true"})
										.append($("<i>",{"class":"material-icons"}).text('clear')) ))
								.append($("<b>").text('Error Alert:'))
								.append('No hay Sótanos registrados')))
					}
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				},
				complete: function(){
					if(cellarid!=''){
						$('#co_sotano').val(cellarid);
						$('#co_sotano').change();
					}
					$('#co_sotano').trigger('chosen:updated');
				}
			});
			$('#co_sotano').on('change', function(evt, params) {
				var value = $(this).val();
				$.ajax({
					url: "{{url('/')}}/ticket/posts",
					type: "GET",
					data: {ids: value},
					dataType: 'JSON',
					success: function(data) {
						if(data.length >0){
							$.each(data, function (i, val){
								$('#co_puesto').append('<option class="co_posts" value="'+val.number+'"> Puesto '+val.number+'</option>');
							});

						}else{
							$("#formTicket").prepend($("<div>",{"class":"alert alert-danger"})
								.append($("<div>",{"class":"container"})
									.append($("<div>",{"class":"alert-icon"})
										.append($("<i>",{"class":"material-icons"}).text('error_outline')))
									.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
										.append($("<span>",{"aria-hidden":"true"})
											.append($("<i>",{"class":"material-icons"}).text('clear')) ))
									.append($("<b>").text('Error Alert:'))
									.append('No hay puestos registrados')))
							$('.co_posts').remove();
							$('#co_puesto').trigger('chosen:updated');
						}
					},
					error: function(xhr, textStatus, thrownError) {
						alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
					},
					complete: function(){
						if(postid!=''){
							$('#co_puesto').val(postid);
						}
						$('#co_puesto').trigger('chosen:updated');
					}
				});
			});
			$('.datetimepicker').datetimepicker({
			    icons: {
			        time: "fa fa-clock-o",
			        date: "fa fa-calendar",
			        up: "fa fa-chevron-up",
			        down: "fa fa-chevron-down",
			        previous: 'fa fa-chevron-left',
			        next: 'fa fa-chevron-right',
			        today: 'fa fa-screenshot',
			        clear: 'fa fa-trash',
			        close: 'fa fa-remove'
			    },
			    format:'DD-MM-YYYY hh:mm'
			});
			let sessionCellar = $('body').find('#doorCellar')
		    if(sessionCellar.val()){
		    	$("#input_port").val(sessionCellar.val())
		    	$('#input_port').trigger('chosen:updated');
		    }
		});


	</script>


@endsection
