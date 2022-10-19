@extends('layouts/main')

@section('title', 'Register')

@section('content')

<div class="d-flex mx-auto justify-content-center align-items-center">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header p-3">
				<h2 class="text-center">{{ __('Register') }}</h2>
			</div>
			<div class="card-body p-4">
				<form action="{{ route('register') }}" method="POST">
					@csrf
					<div class="mb-3">
						<label for="pernum" class="form-label">{{ __('Osobní číslo') }}</label>
						<input type="text"
							class="form-control @error('pernum') is-invalid @enderror"
							id="pernum" name="pernum" value="{{ old('pernum') }}">
						@error('pernum')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="user_name" class="form-label">{{ __('Příjmení Jméno, Titul') }}</label>
						<input type="text"
							class="form-control @error('user_name') is-invalid @enderror"
							id="user_name" name="user_name" value="{{ old('user_name') }}">
						@error('user_name')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
						<input type="email"
							class="form-control @error('email') is-invalid @enderror" id="email"
							name="email" value="{{ old('email') }}">
						@error('email')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="date_birth" class="form-label">{{ __('Datum narození') }}<small class="text-primary"> * (slouží jen pro rezervační smlouvu na kola, mezi nájemcem a pronajímatelem KHN a.s.)</small></label>
						<input type="date"
							class="form-control @error('date_birth') is-invalid @enderror"
							id="date_birth" name="date_birth" value="{{ old('date_birth') }}">
						@error('date_birth')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">{{ __('Password') }}</label>
						<input type="password"
							class="form-control @error('password') is-invalid @enderror"
							id="password" name="password">
						@error('password')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-4">
						<label for="password_confirmation" class="form-label">{{
							__('Confirm_password') }}</label>
						<input type="password" class="form-control" id="password_confirmation"
							name="password_confirmation">
					</div>
					<button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
