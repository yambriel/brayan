@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

<div class="container" id="reporte">
	<div class="text-center" id="title">
	  <div class="row">
	    <div class="col-sm">
	      <h3 class="title">Reportes </h3>
	    </div>
	  </div>
	</div>
	<div class="row">
		<div class="col-sm">
	    	<div class="text-center">
		    	<label for="co_ticket"><h7>Ticket</h7>
		    	</label>
		    </div>
	    	<div class="text-center">
				<select id="co_ticket" name="co_ticket" data-placeholder="Elija el Ticket" class="chosen-select" tabindex="2" style="width: 450px;">
				  	<option value=""></option>
				</select>
			</div>
		</div>
		<div class="col-sm">
	    	<div class="text-center">
		    	<label for="co_cliente"><h7>Trabajador</h7>
		    	</label>
		    </div>
	    	<div class="text-center">
				<select id="co_cliente" name="id_customer" data-placeholder="Elija el Trabajador" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				  	<option value=""></option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm">
		   	<label class="label-control"><h7>Desde</h7></label>
		    <input type="text" name="entry_time" id="entry_time" class="form-control datetimepicker" value="
		    {{
		    date('d-m-Y hh:mm A')
			}}
			"/>
		</div>
		<div class="col-sm">
		   	<label class="label-control"><h7>Hasta</h7></label>
		    <input type="text" name="exit_time" id="exit_time" class="form-control datetimepicker" value="
		    {{
		    date('d-m-Y hh:mm A')
			}}
			"/>
		</div>
	</div>
	<p></p>
	<div class="row">
		<div class="col-sm">
			<div class="text-center">
			  	<button class="btn btn-primary" id="consultar">Consultar</button>
			  	<a href="{{route('report.index')}}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	</div>
	<p></p>
	<div class="row">
	  	<div class="col-sm box-body no-padding hidden" id="table">
		    <table id="tablesd" class="table table-striped table-bordered">
		    	<thead>
				    <tr>
				        <th style="width: 8px">#</th>
				        <th>Trabajador</th>
				        <th>Carnet</th>
				        <th>Carro</th>
				        <th>Sotano</th>
				        <th>Puesto</th>
				        <th>Hora de Entrada</th>
				        <th>Hora de salida</th>
				    </tr>
				</thead>
			    <tbody></tbody>
		  	</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#tablesd').DataTable({
	      "oLanguage": {
	            "sProcessing":     "Procesando...",
	            "sLengthMenu":     "Mostrar _MENU_ registros",
	            "sZeroRecords":    "No se encontraron resultados",
	            "sEmptyTable":     "Ningún dato disponible en esta tabla",
	            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	            "sInfoPostFix":    "",
	            "sSearch":         "Buscar:",
	            "sUrl":            "",
	            "sInfoThousands":  ",",
	            "sLoadingRecords": "Cargando...",
	            "oPaginate": {
	                "sFirst":    "Primero",
	                "sLast":     "Último",
	                "sNext":     "Siguiente",
	                "sPrevious": "Anterior"
	            },
	            "oAria": {
	                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	            }
	      }
	    });
		$.ajax({
			url: "{{url('/')}}/report/tickets/",
			type: "GET",
			dataType: 'JSON',
			success: function(data) {
				if(data.length >0){
					$.each(data, function (i, val){
						$('#co_ticket').append('<option value="'+val.id+'">'+val.id+' </option>');
					});
				}else{
					$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
						.append($("<div>",{"class":"container"})
							.append($("<div>",{"class":"alert-icon"})
								.append($("<i>",{"class":"material-icons"}).text('error_outline')))
							.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
								.append($("<span>",{"aria-hidden":"true"})
									.append($("<i>",{"class":"material-icons"}).text('clear')) ))
							.append($("<b>").text('Alerta:'))
							.append('No hay Ticket registrados')))
				}
			},
			error: function(xhr, textStatus, thrownError) {
				alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
			},
			complete: function(){
				$('#co_ticket').trigger('chosen:updated');
			}
		});
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
					$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
						.append($("<div>",{"class":"container"})
							.append($("<div>",{"class":"alert-icon"})
								.append($("<i>",{"class":"material-icons"}).text('error_outline')))
							.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
								.append($("<span>",{"aria-hidden":"true"})
									.append($("<i>",{"class":"material-icons"}).text('clear')) ))
							.append($("<b>").text('Alerta:'))
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
		    format:'DD-MM-YYYY hh:mm A'
		});
		$('#consultar').click(function(event) {
			event.preventDefault();
			/* Act on the event */
			var values="1";
			if($("#entry_time").val()==""){
				$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
					.append($("<div>",{"class":"container"})
						.append($("<div>",{"class":"alert-icon"})
							.append($("<i>",{"class":"material-icons"}).text('error_outline')))
						.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
							.append($("<span>",{"aria-hidden":"true"})
								.append($("<i>",{"class":"material-icons"}).text('clear')) ))
						.append($("<b>").text('Alerta:'))
						.append('Debe Ingresar una Fecha de Entrada')))
				return false;
			}
			if($("#exit_time").val()==""){
				$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
					.append($("<div>",{"class":"container"})
						.append($("<div>",{"class":"alert-icon"})
							.append($("<i>",{"class":"material-icons"}).text('error_outline')))
						.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
							.append($("<span>",{"aria-hidden":"true"})
								.append($("<i>",{"class":"material-icons"}).text('clear')) ))
						.append($("<b>").text('Alerta:'))
						.append('Debe Ingresar una Fecha de Salida')))
				return false;
			}
			var coticket=$("#co_ticket").val()
			var cocliente=$("#co_cliente").val()
			var entrytime=$("#entry_time").val()
			var exitime=$("#exit_time").val()
			$.ajax({
				url: "{{url('/')}}/report/ticket/",
				type: "GET",
				dataType: 'JSON',
				data: {ids: values,coticket: coticket, cocliente: cocliente,entrytime :entrytime,exitime :exitime},
				success: function(data) {
					$("#table").removeClass('hidden')
					$('tbody').empty();
					console.log(data.count)
					if(data.length >0){
						$.each(data, function (i, val){
							var dataexit=typeof val.exitentry==="object"?'':val.exitentry
							var dataentry=typeof val.dateentry==="object"?'':val.dateentry
							$('tbody').append('<tr><td>'+val.id+'</td><td>'+val.namecli+'</td><td>'+val.carnetit+'</td><td>'+val.namecar+'</td><td>'+val.namesotado+'</td><td>'+val.number+'</td><td>'+dataentry+'</td><td>'+dataexit+'</td></tr>');
						});
					}else{
						$('tbody').append('<tr><td colspan="8">No hay tickets de Entrada Registrados !!</td></tr>')
					}
				},
				error: function(xhr, textStatus, thrownError) {
					alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
				}
			});
		});
	});
</script>
@endsection
