@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

 <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="#0">vehiculos </a>
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
                  
                </ul>
              </div>
            </div>
          </nav>
      <div class="box">
  <div class="box-header">
    <h3 class="box-title">Carros dentro del Sistema</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="width: 10px">#</th>
        <th>cliente</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Placa</th>
        <th>Acción</th>
      </tr>
      @if($cars->count())  
      @foreach($cars as $car)  
      <tr>
        <td>{{$car->id}}</td>
        <td>{{$car->name}}</td>
        <td>{{$car->model}}</td>
        <td>{{$car->color}}</td>
        <td>{{$car->placa}}</td>
        <td>
          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
          <form action="{{action('CarController@destroy', $car->id)}}" method="post">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="DELETE">
          <a data-toggle="tooltip" data-placement="top" title="Editar vehiculo" class="btn-edit" href="{{action('CarController@edit', $car->id)}}" ><i class="fas fa-edit"></i>
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
        <td colspan="8">No hay carros registrados !!</td>
      </tr>
      @endif
    </table>
  </div>
  {{ $cars->links() }}
  <!-- /.box-body -->
</div>
@endsection