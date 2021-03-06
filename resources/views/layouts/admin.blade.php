<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>

  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="{{ asset('css/css.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />

   <!-- DATATABLES -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />


  <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('chosen/chosen.min.css') }}">


  <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/javascript"></script>
  <!-- <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script> -->
  {{-- con error --}}
  <script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/funciones_validador.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jquery.mask.js') }}" type="text/javascript"></script>
</head>
<body class="@yield('body-class')">
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}"> <img src="/img/pdvsa.png" width="80" height="19">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">

             @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registro</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesiòn
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>
      </div>
    </div>
</nav>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/c2.jpg')}}');"></div>
  <div class="main main-raised">
          <nav class="navbar navbar-expand-lg bg-rose">
            <div class="container">
              <div class="navbar-translate">
                <a href="{{ route('home') }}" class="navbar-brand" href="#0">Inicio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link">Trabajadores</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('car.index') }}" class="nav-link">Vehículo</a>
                  </li>
                    <li class="nav-item">
                    <a href="{{ route('ticket.index') }}" class="nav-link">Ticket</a>
                  </li>
                  @if (Auth::user()->admin)
                    <li class="nav-item">
                      <a href="{{ route('cellar.index') }}" class="nav-link">Sótanos</a>

                    </li>
                    <li class="nav-item">
                      <a href="{{ route('report.index') }}" class="nav-link">Reportes</a>
                    </li>
                  @endif

                </ul>

              </div>
            </div>
          </nav>
    <div class="section section-basic">
      <div class="container">
        <div class="wrapper">
          <div class="container">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
<input id="doorCellar" name="doorCellar" type="hidden" value="{{session('doorCellar')}}">
        <footer class="footer footer-default">
            <div class="container">
              <nav class="float-left">
                <ul>
                  <li>
                  </li>
                  <li>
                  </li>
                  <li>
                  </li>
                  <li>
                  </li>
                </ul>
              </nav>
              <div class="copyright float-right">
                 CEPDVSA  - Control de Estacionamiento de PDVSA La Campiña -Todos los Derechos Reservados.
                 &copy;
                 <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
          </footer>
  <!--   Core JS Files   -->
</body>

  <script src="{{ asset('chosen/chosen.jquery.js') }}" type="text/javascript"></script>
  <script src="{{ asset('chosen/docsupport/init.js') }}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  {{-- sin error --}}
  {{-- <script src="{{ asset('js/material-kit.min.js') }}" type="text/javascript"></script> --}}
    <!-- DATATABLES -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
</html>
