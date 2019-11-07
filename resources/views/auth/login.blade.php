@extends('layouts.app')

@section('body-class','login-page sidebar-collapse')


@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('/img/bg8.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicio de sección</h4>
              </div>
              <p class="description text-center">Ingresa tus datos</p>
               

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="correo" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                  </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Contraseña" name="password" required autocomplete="current-password">
                    </div>
                </div>
            
            <!-- Material unchecked -->
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="https://creative-tim.com/presentation">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
            <li>
              <a href="https://www.creative-tim.com/license">
                Licenses
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
      </div>
    </footer>
</div>
@endsection
