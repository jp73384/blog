@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">¡Bienvenido!</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-label-group">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">Correo electronico</label>
                  </div>
  
                  <div class="form-label-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password">Contraseña</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
  
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} >
                    <label class="custom-control-label" for="customCheck1">Recordar Contraseña</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Iniciar sesión</button>
                  <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">¿Olvidaste tú contraseña?</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
@endsection