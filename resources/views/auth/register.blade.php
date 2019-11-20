@extends('layouts.app')

@section('body-class')
  
@section('content')

<div class="page-header header-filter" style="background-image: url('{{ asset('/img/bg8.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="registro" class="form" method="POST" action="{{ route('register') }}" role="form">
                @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Registro</h4>
              </div>
              <p class="description text-center">Completa tus datos</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" id="name">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electronico" name="email" value="{{ old('email') }}" id="email">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" id="password">
                    </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input  type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Confirmar Contraseña" name="password_confirmation"  id="password_confirmation">
                    </div>
                </div>
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Confirmar
                Registro</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
    <script>
  if ($("#registro").length > 0) {
      $("#registro").validate({

      rules: {
        name: {
          notNumber: true,
            required: true,
            },
        email: {
              required: true,
              emailvalid: true,
              },
      password: {
              required: true,
              minlength:1,
              maxlength:8,
              onlynumber: true,
              },
      password_confirmation: {
              required: true,
              minlength:1,
              maxlength:8,
              onlynumber: true,
              },
    
      },
      messages: {
        name: {
            notNumber: "Por favor ingrese solo letras",
            required: "Por favor ingrese el Nombre",
        },
          email: {
           required: "Por Favor Ingrese el Correo",
           emailvalid: "Ingrese un correo valido"
          },
          password: {
              required: "Por Favor Ingrese la Contraseña",
              minlength: "la Contraseña debe contener entre 1 o 8  Digitos",
              maxlength: "la Contraseña contener entre 1 o 8 Digitos",
              onlynumber: "Ingrese solo Números"
          },
         password_confirmation: {
              required: "Por Favor Ingrese la Confirmación de la Contraseña ",
              minlength: "la Contraseña debe contener entre 1 o 8  Digitos",
              maxlength: "la Contraseña contener entre 1 o 8 Digitos",
              onlynumber: "Ingrese solo Números"
          },
        
      },
     });
  };
  </script>
@endsection
