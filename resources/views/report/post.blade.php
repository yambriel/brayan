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
		    	<label for="co_cellar"><h7>Sótano</h7>
		    	</label>
		    </div>
	    	<div class="text-center">
				<select id="co_cellar" name="id_cellar" data-placeholder="Elija el Sótano" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				  	<option value=""></option>
				</select>
			</div>
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
				        <th>Sótano</th>
				        <th>Puesto</th>
				        <th>Estatus</th>
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
			url: "{{url('/')}}/ticket/cellar",
			type: "GET",
			dataType: 'JSON',
			success: function(data) {
				if(data.length >0){
					$.each(data, function (i, val){
						$('#co_cellar').append('<option value="'+val.id+'">'+val.name+' </option>');
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
							.append('No hay Sótanos registrados')))
				}
			},
			error: function(xhr, textStatus, thrownError) {
				alert('Problemas en el servidor LLAMA A BRAYANNNNN.. Vuelva a intentar, si el problema persiste comuniquese con soporte');
			},
			complete: function(){
				$('#co_cellar').trigger('chosen:updated');
			}
		});
		$('#consultar').click(function(event) {
			event.preventDefault();
			/* Act on the event */
			var values="1";
			if($("#co_cellar").val()==""){
				$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
					.append($("<div>",{"class":"container"})
						.append($("<div>",{"class":"alert-icon"})
							.append($("<i>",{"class":"material-icons"}).text('error_outline')))
						.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
							.append($("<span>",{"aria-hidden":"true"})
								.append($("<i>",{"class":"material-icons"}).text('clear')) ))
						.append($("<b>").text('Alerta:'))
						.append('Debe Seleccionar un Sótano')))
				return false;
			}
			var codsot=$("#co_cellar").val()
			$.ajax({
				url: "{{url('/')}}/report/post/",
				type: "GET",
				dataType: 'JSON',
				data: {ids: values,codsot: codsot},
				success: function(data) {
					$("#table").removeClass('hidden')
					$('tbody').empty();
					if(data.length >0){
						$.each(data, function (i, val){
							var estatus=val.estatus==0?'<span style="color:green">Disponible</span>':'<span style="color:red">Ocupado por Ticket:<b>'+val.ticketnum+'</b></span>'
							$('tbody').append('<tr><td>'+val.namesotado+'</td><td>'+val.namepost+'</td><td>'+estatus+'</td></tr>');
						});
					}else{
						$('tbody').append('<tr><td colspan="3">No hay Sótanos Registrados !!</td></tr>')
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
