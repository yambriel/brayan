@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

 <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('ticket.index') }}">Ticket de Entrada</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                <li class="active nav-item active">
              <a href="{{ route('ticket.create') }}" class="nav-link">Agregar</a>
                </li>
                </ul>
                <form class="form-inline ml-auto">
                <div class="form-group no-border">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-white btn-just-icon btn-round">
                    <i class="material-icons">search</i>
                </button>
            </form>
              </div> 

            </div>
          </nav>

      <div class="box">
  <div class="box-header">
    <h3 class="box-title">Ingresar Nuevo Ticket</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
      <tr>
        <th style="width: 8px">#</th>
        <th>Cliente</th>
        <th>Carnet</th>
        <th>Carro</th>
        <th>Sotano</th>
        <th>Puesto</th>
        <th>Hora de Entrada</th>
        <th>Acción</th>
      </tr>
      @if($tickets->count())  
      @foreach($tickets as $ticket)  
      <tr>
        <td>{{$ticket->id}}</td>
        <td>{{$ticket->namecli}}</td>
        <td>{{$ticket->carnetit}}</td>
        <td>{{$ticket->namecar}}</td>
        <td>{{$ticket->namesotado}}</td>
        <td>{{$ticket->number}}</td>
        <td>{{$ticket->dateentry}}</td>
        <td>
          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
              <form action="{{action('TicketController@destroy', $ticket->id)}}" method="post">
               {{csrf_field()}}
               <input name="_method" type="hidden" value="DELETE">
               <a data-toggle="tooltip" data-placement="top" title="Editar Ticket" class="btn-edit" href="{{action('TicketController@edit', $ticket->id)}}" ><i class="fas fa-edit"></i>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Ingresar Fecha Salida" href="{{url('/')}}/ticket/editexit/{{$ticket->id}}" ><i class="fas fa-calendar-alt"></i>
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
        <td colspan="8">No hay tickets de Entrada Registrados !!</td>
      </tr>
      @endif
    </table>
  </div>
  {{ $tickets->links() }}
  <!-- /.box-body -->
</div>

@endsection