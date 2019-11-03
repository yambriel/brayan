@extends('layouts.app')

@section('body-class','landing-page sidebar-collapse')


@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/pdvsa_welcome.jpg')}}');">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Control de Estacionamiento</h1>
          <h4>Bienvenido al control de estacionamiento de Pdvsa La Campiña</h4>
          <br>
        </div>
      </div>
    </div>
  </div>
  
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h3 class="title">Control de Estacionamiento la Estancia</h3>
            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
            </div>
          </div>

            <div class="title">
            <h3>Notas de Interes</h3>
            </div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="w-75 p-3" src="{{asset('/img/pd1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="w-50 p-3" src="{{asset('/img/pd2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="w-75 p-3" src="{{asset('/img/pd3.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




        </div>
      </div>
  </div>





@endsection
