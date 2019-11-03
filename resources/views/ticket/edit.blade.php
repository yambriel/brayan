@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
	<form class="form" method="POST" action="{{ route('ticket.update',$ticket->id) }}"  role="form">
      @csrf
      @method('PUT')
      <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
	  <div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_cliente">Cliente</label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_cliente" name="id_customer" data-placeholder="Elija el Cliente" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
		</div>
		<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_car">Carro</label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_car" name="car_id" data-placeholder="Elija el Carro" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    </select>
		    	</div>
		    </div>
	    </div>
		<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_sotano">Sotano</label>
		    	</div>
		   	</div>
		  	<div class="row">
			  	<div class="col col-lg-2">
				    <select id="co_sotano" name="cellar_id" data-placeholder="Elija el Sotano" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
		</div>
	  	<div class="form-group">
		  	<div class="row">
			  	<div class="col col-lg-2">
			    	<label for="co_puesto">Puesto</label>
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
		   	<label class="label-control">Fecha y Hora de Entrada</label>
		    <input type="text" ID="entry_time" name="entry_time" class="form-control datetimepicker" value="{{$ticket->entry_time}}"/>

		</div>
	    <div class="form-group">
	    	<div class="form-check">
				<label class="form-check-label">
	                <input class="form-check-input" type="radio" name="systemTimeEntry" id="exampleRadios1" value="AM" {{($ticket->systemTimeEntry == 'AM') ? 'checked' : ''}}> AM
	                <span class="circle">
	            	    <span class="check"></span>
	                </span>
	            </label>
			</div>
			<div class="form-check">
				<label class="form-check-label">
	                <input class="form-check-input" type="radio" name="systemTimeEntry" id="exampleRadios1" value="PM" {{($ticket->systemTimeEntry == 'PM') ? 'checked' : ''}}> PM
	                <span class="circle">
	            	    <span class="check"></span>
	                </span>
	            </label>
			</div>
		</div>
	  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
	  <a href="{{ URL::previous() }}" class="btn btn-primary">Regresar</a>
	</form>
	<script>
		$(document).ready(function () {
			var idcustomer = '{{$ticket->id_customer}}'
			var carid = '{{$ticket->car_id}}'
			var cellarid = '{{$ticket->cellar_id}}'
			var postid = '{{$ticket->post_id}}'
			var fieldDisabled = '{{$ticket->fieldDisabled}}'
			$.ajax({	
				url: "{{url('/')}}/ticket/customer",
				type: "GET",
				dataType: 'JSON',
				success: function(data) {
					if(data.length >0){
						$.each(data, function (i, val){
							$('#co_cliente').append('<option value="'+val.id+'">'+val.name+' '+val.last_name+'</option>');
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
								.append('No hay clientes registrados')))
					}
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				},
				complete: function(){
					$('#co_cliente').val(idcustomer);
					if (fieldDisabled!=0) {
						// statement
						$('#co_cliente').prop('disabled', true).trigger("liszt:updated");
						$('#entry_time').addClass('hidden')
					}
					$('#co_cliente').trigger('chosen:updated');
				}
			});
			var values = idcustomer;
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
								.append('No hay carros registrados')))
						$('.co_car').remove();
						$('#co_car').trigger('chosen:updated');
					}
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				},
				complete: function(){
					$('#co_car').val(carid);
					if (fieldDisabled!=0) {
						// statement
						$('#co_car').prop('disabled', true).trigger("liszt:updated");
					}
					$('#co_car').trigger('chosen:updated');
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
									.append('No hay carros registrados')))
							$('.co_car').remove();
							$('#co_car').trigger('chosen:updated');
						}
					},
					error: function(xhr, textStatus, thrownError) {
						alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
					},
					complete: function(){
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
								.append('No hay sotanos registrados')))
					}
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				},
				complete: function(){
					$('#co_sotano').val(cellarid);
					if (fieldDisabled!=0) {
						// statement
						$('#co_sotano').prop('disabled', true).trigger("liszt:updated");
					}
					$('#co_sotano').trigger('chosen:updated');
				}
			});
			var valuepost = postid;
			$.ajax({	
				url: "{{url('/')}}/ticket/getpostsall",
				type: "GET",
				data: {ids: valuepost},				
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
					$('#co_puesto').val(valuepost);
					if (fieldDisabled!=0) {
						// statement
						$('#co_puesto').prop('disabled', true).trigger("liszt:updated");
					}
					$('#co_puesto').trigger('chosen:updated');
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
		
		});


	</script>


@endsection