@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Registrar</h5>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-label-group">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="name">Nombre</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="email">Correo Electronico</label>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="password" id="password" placeholder="password" required class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="password">Contraseña</label>
              </div>
              
              <div class="form-label-group">
                <input type="password" id="password-confirm" class="form-control" placeholder="Password" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Confirmar contraseña</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection