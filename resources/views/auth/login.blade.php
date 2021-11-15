@extends('layouts.app-login-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-group">
        <div class="card p-4">
          
          <div class="card-header">{{ __('Login') }}</div>
          
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              
              <p class="text-muted">Sign In to your account</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="cil-user"></i>
                  </span>
                </div>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="cil-lock-locked"></i>
                  </span>
                </div>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit">Login</button>
                </div>
                {{-- <div class="col-6 text-right">
                  <button class="btn btn-link px-0" type="button">Forgot password?</button>
                </div> --}}
              </div>

            </form>
          </div>
        </div>
        
        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
          <div class="card-body text-center">
            <div>
              <h2>Sign up</h2>
              <p>Register to the testing Library portal</p>
              
              @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-lg btn-outline-light mt-3">Register</a>
              @endif
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
@endsection


{{-- <div class="row">
  <label for="email" class="col-md-4">{{ __('E-Mail Address') }}</label>
  
  <div class="col-md-6">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="row">
  <label for="password" class="col-md-4">{{ __('Password') }}</label>
  
  <div class="col-md-6">
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="row">
  <div class="col-md-6 offset-md-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      
      <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
      </label>
    </div>
  </div>
</div>

<div class="row mb-0">
  <div class="col-md-8 offset-md-4">
    <button type="submit" class="btn btn-primary">
      {{ __('Login') }}
    </button>
    
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
    </a>
    @endif
  </div>
</div> --}}