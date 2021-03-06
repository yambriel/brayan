@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
@include('layouts.success')
@include('layouts.errors')
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('car.index') }}">Vehiculos </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                  <li class="active nav-item">
                    <a href="{{ route('car.create') }}" class="nav-link">
                      Agregar
                    </a>
                  </li>
                </ul>
              </div>
            </div>
      </nav>
    <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Vehciulos dentro del Sistema</h3>
                </div>
  <!-- /.box-header -->
          <div class="container">
            <table id="cars" class="table table-striped table-bordered">
                 <thead>
                  <tr>
                    <th>Carnet</th>
                    <th>Trabajador</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Placa</th>
                    <th>Acción</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($cars->count())  
                  @foreach($cars as $car)  
                  <tr>
                    <td>{{$car->carnet}}</td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->color}}</td>
                    <td>{{$car->placa}}</td>
                    <td>
                      <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <a data-toggle="tooltip" data-placement="top" title="Editar vehiculo" class="btn-edit" href="{{action('CarController@edit', $car->id)}}" ><i class="fas fa-edit"></i>
                            </a>
                            <a class="deleted" data-id="{{$car->id}}" data-name="{{$car->placa}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash"></i>
                          </a>
                      </div>
                    </div>
                  </td>
                </tr>
                 @endforeach 
                     </tbody> 
                  @else
                     <tr>
                      <td colspan="8">No hay Vehiculos registrados !!</td>
                    </tr>
                    @endif
            </table>
    </div>
</div>
<script>
    $(document).ready(function() {

      $('#cars').DataTable({
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

      $('#cars tbody').on('click', '.deleted', function (e) {
        var id = $(this).data('id');
        var name = $(this).data('name');
        Swal.fire({
            title: 'Eliminar',
            text: "Desea Eliminar el Carro con la Placa: "+name+"?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No',
            buttonsStyling: true
        }).then(function (e) {
            if (e.value === true) {
              $.ajax({
                  type: "GET",
                  url: "{{url('/')}}/car/getDelete/"+id,
                  cache: false,
                  success: function(response) {
                      Swal.fire({title: "Procesado", 
                        showCancelButton: false,
                        text: "El Carro con la Placa: "+name+" se ha eliminado satisfactoriamente",
                        icon: 'success',
                      }).then(result => {
                        if (result.value) {
                          location.reload();
                          // handle Confirm button click
                          // result.value will contain `true` or the input value
                        }
                      })
                  },
                  failure: function (response) {
                      Swal.fire(
                      "Error Interno",
                      "Ah ocurrido un error al eliminar el Carro", // had a missing comma
                      "error"
                      )
                  }
              });
          }
        });
      });
    });
</script>
@endsection