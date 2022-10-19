@extends('layouts/main')

@section('title', 'Reset password')

@section('content')
  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">{{ __('Reset password') }}</h3>
        </div>
        <div class="card-body p-4">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input name="token" type="hidden" value="{{ $token }}">
            <div class="mb-3">
              <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') ?? $email }}">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">{{ __('New password') }}</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
              @enderror
            </div>
            <div class="mb-4">
              <label class="form-label" for="password_confirmation">{{ __('Confirm new password') }}</label>
              <input class="form-control" id="password_confirmation" name="password_confirmation" type="password">
            </div>
            <button class="btn btn-primary" type="submit">{{ __('Reset password') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
