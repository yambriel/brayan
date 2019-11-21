@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

<div class="container" id="reporte">
	<div class="text-center" id="title">
	  <div class="row">
	    <div class="col-sm">
	      <h3 class="title">Puestos</h3>
	    </div>
	  </div>
	</div>
			<div class="row">
		  	<div class="col-sm">
			  	<div class="text-center">
			    	<label for="co_sotano"><h7>Sotano</h7></label>
		    	</div>
		   	</div>
		  	<div class="text-center">
				    <select id="co_sotano" name="cellar_id" data-placeholder="Elija el Sotano" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    	<option value=""></option>
				    </select>
		    	</div>
		    </div>
	  	<div class="row">
		  	<div class="col-sm">
			  	<div class="text-center">
			    	<label for="co_puesto"><h7>Puesto</h7></label>
		    	</div>
		   	</div>
		  	<div class="text-center">
				    <select id="co_puesto" name="post_id" data-placeholder="Elija el puesto" class="chosen-select" tabindex="2" style="width: 450px;" required="required">
				    </select>
		    	</div>
		    </div>
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
				        <th>sotano</th>
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
						$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
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
							$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
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

		$('#consultar').click(function(event) {
			event.preventDefault();
			/* Act on the event */
			var values="1";
			if($("#co_sotano").val()==""){
				$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
					.append($("<div>",{"class":"container"})
						.append($("<div>",{"class":"alert-icon"})
							.append($("<i>",{"class":"material-icons"}).text('error_outline')))
						.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
							.append($("<span>",{"aria-hidden":"true"})
								.append($("<i>",{"class":"material-icons"}).text('clear')) ))
						.append($("<b>").text('Alerta:'))
						.append('Debe Seleccionar un Sotano')))
				return false;
			}
			if($("#co_puesto").val()==""){
				$(".container#reporte").prepend($("<div>",{"class":"alert alert-danger"})
					.append($("<div>",{"class":"container"})
						.append($("<div>",{"class":"alert-icon"})
							.append($("<i>",{"class":"material-icons"}).text('error_outline')))
						.append($("<button>",{"class":"close","type":"button","data-dismiss":"alert","aria-label":"Close"})
							.append($("<span>",{"aria-hidden":"true"})
								.append($("<i>",{"class":"material-icons"}).text('clear')) ))
						.append($("<b>").text('Alerta:'))
						.append('Debe Seleccionar un Sotano')))
				return false;
			}
			var cosotano=$("#co_sotano").val()
			var copuesto=$("#co_puesto").val()
			$.ajax({
				url: "{{url('/')}}/report/post/",
				type: "GET",
				dataType: 'JSON',
				data: {ids: values,cosotano: cosotano,copuesto :copuesto},
				success: function(data) {
					if(data.length >0){
						$("#table").removeClass('hidden')
						$.each(data, function (i, val){
							$('tbody').append('<tr><td>'+val.id+'</td><td>'+val.name+'</td><td>'+val.cantidadPuestos+'</td></tr>');
						});
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
					}else{
						$('tbody').append('<tr><td colspan="8">No hay sotanos !!</td></tr>')
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
