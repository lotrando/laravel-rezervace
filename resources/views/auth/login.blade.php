@extends('layouts/main')

@section('title', 'Login')

@section('content')

  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-md-5">
      @include('partials.alerts')
      <div class="card">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Login') }}</h2>
        </div>
        <div class="card-body p-4">
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-4">
              <label class="form-label" for="password">{{ __('Password') }}</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>
            @if (Route::has('password.request'))
              <a class="btn btn-secondary" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
