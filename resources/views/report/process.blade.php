@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')


  <div class="box-header">
    <h3 class="box-title">Tickets Procesados</h3>
    </div>
  <div lass="container" id="report">
    <table class="table table-striped table-bordered" id="tablesd">
      
      <thead>
      <tr>
        <th style="width: 8px">#</th>
            <th>Trabajador</th>
            <th>Carnet</th>
            <th>Vehículo</th>
            <th>Sótano</th>
            <th>Puesto</th>
            <th>Hora de Entrada</th>
            <th>Puerta de Entrada</th>
            <th>Hora de Salida</th>
            <th>Puerta de Salida</th>
      </tr>
    </thead>
    <tbody>
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
        <td>{{$report->inputp}}</td>
        <td>{{$report->exitentry}}</td>
        <td>{{$report->outp}}</td>
       </tr>
       @endforeach 
     </tbody>
       @else
       <tr>
        <td colspan="8">No hay ningun ticket !!</td>
      </tr>
      @endif
    </table>
    <div class="text-center">
          <a href="{{route('report.index')}}" class="btn btn-primary">Regresar</a>
      </div>
  </div>
<script>
    $(document).ready( function () {
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
} );
</script>


@endsection