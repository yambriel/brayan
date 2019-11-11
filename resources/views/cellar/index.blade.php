@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

 <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('cellar.index') }}">Sotanos </a>
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
                    <a href="{{ route('cellar.create') }}" class="nav-link">
                      Agregar
                    </a>
                  
                </ul>
              </div>
            </div>
          </nav>
      <div class="box">
  <div class="box-header">
    <h3 class="box-title">Sotanos Registrados Dentro Del Sistema</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="width: 10px">#</th>
        <th>Nombre</th>
        <th>N° Puestos</th>
        <th>Acción</th>
      </tr>
      @if($cellars->count())  
      @foreach($cellars as $cellar)  
      <tr>
        <td>{{$cellar->id}}</td>
        <td>{{$cellar->name}}</td>
        <td>{{$cellar->cantidadPuestos}}</td>
        <td>
          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
          {{-- <form action="{{action('CellarController@destroy', $cellar->id)}}" method="post">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="DELETE"> --}}
           <a data-toggle="tooltip" data-placement="top" title="Editar Sotano" class="btn-edit" href="{{action('CellarController@edit', $cellar->id)}}" ><i class="fas fa-edit"></i>
          </a>
          <a class="deleted" data-id="{{$cellar->id}}" data-name="{{$cellar->name}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash"></i>
          </a>
          {{-- <button class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar"type="submit"><i class="fas fa-trash"></i>
               </button>
             </form> --}}
          </div>
        </div>
        </td>
       </tr>



       @endforeach 
       @else
       <tr>
        <td colspan="8">No hay Sotanos registrados !!</td>
      </tr>
      @endif
    </table>
  </div>
  {{ $cellars->links() }}
  <!-- /.box-body -->
</div>
<script>
    $(document).ready(function() {
      $('.deleted').click(function(e) {
        var id = $(this).data('id');
        var name = $(this).data('name');
        Swal.fire({
            title: 'Eliminar',
            text: "Desea Eliminar el Sotano: "+name+"?",
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
                  url: "{{url('/')}}/cellar/getDelete/"+id,
                  cache: false,
                  success: function(response) {
                      Swal.fire({title: "Procesado", 
                        showCancelButton: false,
                        text: "El Sotano: "+name+" se ha eliminado satisfactoriamente",
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
                      "Ah ocurrido un error al eliminar el Sotano", // had a missing comma
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