@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')

@include('layouts.success')
@include('layouts.errors')

<div class="container">
<div class="text-center" id="title">
  <div class="row">
    <div class="col-sm">
      <h3 class="title">Reportes </h3>
    </div>
  </div>
</div>
  <div class="row" id="button">
    <div class="col-sm">
      <div class="text-center">
        <a href="{{url('/')}}/report/customer/" class="btn btn-primary btn-lg" id="trabajador">Reporte Por Trabajador</a>
      </div>
    </div>
    <div class="col-sm">
      <div class="text-center">
        <a href="{{url('/')}}/report/post/" class="btn btn-primary btn-lg" id="puestos">Reporte Puestos Disponibles</a>
      </div>
    </div>
    <div class="col-sm">
      <div class="text-center">
        <a href="{{url('/')}}/report/ticket/" class="btn btn-primary btn-lg" id="ticket">Reporte Por Ticket</a>
      </div>
    </div>
  </div>
</div>
@endsection
