@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

 <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="#0">Sotanos </a>
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
          <form action="{{action('CellarController@destroy', $cellar->id)}}" method="post">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="DELETE">
           <a data-toggle="tooltip" data-placement="top" title="Editar Sotano" class="btn-edit" href="{{action('CellarController@edit', $cellar->id)}}" ><i class="fas fa-edit"></i>
          </a>
          <button class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar"type="submit"><i class="fas fa-trash"></i>
               </button>
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
@endsection