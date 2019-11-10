@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

 <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
              <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('report.index') }}">Reporte de tickets</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div> 
            </div>
          </nav>

     <div class="box">
  <div class="box-header">
    <h3 class="box-title">Reportes de Tickets</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-striped">
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
      @if($reports->count())  
      @foreach($reports as $report)  
      <tr>
        <td>{{$report->id}}</td>
        <td>{{$report->namecli}}</td>
        <td>{{$report->carnetit}}</td>
        <td>{{$report->namecar}}</td>
        <td>{{$report->namesotado}}</td>
        <td>{{$report->number}}</td>
        <td>{{$report->dateentry}}</td>
        <td>{{$report->exitentry}}</td>
       </tr>
       @endforeach 
       @else
       <tr>
        <td colspan="8">No hay ningun ticket !!</td>
      </tr>
      @endif
    </table>
  </div>
  {{ $reports->links() }}
  <!-- /.box-body -->
</div>

@endsection