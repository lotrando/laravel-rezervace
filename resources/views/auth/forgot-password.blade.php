@extends('layouts/main')

@section('title', 'Forgot password')

@section('content')

  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Forgot password') }}</h2>
        </div>
        <div class="card-body p-4">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form action="{{ route('password.email') }}" method="POST">
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
            <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
