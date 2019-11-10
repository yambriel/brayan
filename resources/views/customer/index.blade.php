@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
@include('layouts.success')
@include('layouts.errors')
          <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('customer.index') }}">Trabajadores </a>
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
                    <a href="{{ route('customer.create') }}" class="nav-link">
                      Agregar
                    </a>
                  
                </ul>
              </div>
            </div>
          </nav>
      <div class="box">
  <div class="box-header">
    <h3 class="box-title">Trabajadores Registrados</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th>Carnet</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>extensión</th>
        <th>Acción</th>
      </tr>
      @if($customers->count())  
      @foreach($customers as $customer)  
      <tr>
        <td>{{$customer->carnet}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->last_name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->extension}}</td>
        <td>
          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
              <form action="{{action('CustomerController@destroy', $customer->id)}}" method="post">
                 {{csrf_field()}}
                 <input name="_method" type="hidden" value="DELETE">
                 <a data-toggle="tooltip" data-placement="top" title="Editar Trabajador" class="btn-edit"href="{{action('CustomerController@edit', $customer->id)}}" ><i class="fas fa-edit"></i>
                </a>
              <button class="btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar"type="submit"><i class="fas fa-trash"></i>
               </button>
              </form>
            </div>
          </div>
        </td>
      </tr>
      @endforeach 
      @else
      <tr>
        <td colspan="8">No hay Trabajadores registrados !!</td>
      </tr>
      @endif
    </table>
  </div>
  {{ $customers->links() }}
  <!-- /.box-body -->
</div>
@endsection