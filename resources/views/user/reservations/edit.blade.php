@extends('layouts/main')

@section('title', 'Edit Reservation')

@section('content')

<div class="d-flex mx-auto justify-content-center align-items-center">
	<div class="col-8">
		<div class=" card">
			<div class="card-header p-3">
				<h2 class="text-center">{{ __('Edit Reservation') }}</h2>
			</div>
			<div class="card-body p-4">
				<form action="{{ route('user.reservations.update', $reservation->id) }}"
					method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="mb-3 col-12">
							<label for="department_id" class="form-label">{{ __('Department')
								}}</label>
							<select type="text"
								class="form-control @error('department_id') is-invalid @enderror"
								id="department_id" name="department_id">
								<option value="{{ $reservation->department_id ?? ' ' }}">
									{{ $reservation->department->department_code ?? ' ' }} -
									{{ $reservation->department->department_name ?? 'Choose
									department ...' }}
								</option>
								@foreach ( $departments as $department )
								<option value="{{ $department->id }}">{{
									$department->department_code }} - {{
									$department->department_name }}</option>
								@endforeach
							</select>
							@error('department_id')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="date_start" class="form-label">{{ __('From')
								}}</label>
							<input type="date"
								class="form-control @error('date_start') is-invalid @enderror"
								id="date_start" name="date_start"
								value="{{ $reservation->date_start }}">
							@error('date_start')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
						<div class="mb-3 col-6">
							<label for="date_end" class="form-label">{{ __('To')
								}}</label>
							<input type="date"
								class="form-control @error('date_end') is-invalid @enderror"
								id="date_end" name="date_end" value="{{ $reservation->date_end }}">
							@error('date_end')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
							@enderror
						</div>
					</div>
					<div class="mb-3">
						<label for="rooms" class="form-label">{{ __('Rooms') }}</label>
						<input type="text" class="form-control @error('rooms') is-invalid @enderror"
							id="rooms" name="rooms" value="{{ $reservation->rooms }}">
						@error('rooms')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="doors" class="form-label">{{ __('Doors') }}</label>
						<input type="text" class="form-control @error('doors') is-invalid @enderror"
							id="doors" name="doors" value="{{ $reservation->doors }}">
						@error('doors')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="specials" class="form-label">{{ __('Specials') }}</label>
						<input type="text"
							class="form-control @error('specials') is-invalid @enderror"
							id="specials" name="specials" value="{{ $reservation->specials }}">
						@error('specials')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<div class="mb-3">
						<label for="status" class="form-label">{{ __('Status')
							}}</label>
						<select type="text"
							class="form-control @error('status') is-invalid @enderror" id="status"
							name="status">
							<option value="{{ $reservation->status ?? 'Vloženo'}}">
								{{ $reservation->status ?? 'Vloženo' }}
							</option>
							@can('is-admin')
							<option value="Vloženo">Vloženo</option>
							<option value="Schváleno">Schváleno</option>
							@endcan
						</select>
						@error('status')
						<span class="invalid-feedback" role="alert">
							{{ $message }}
						</span>
						@enderror
					</div>
					<input type="hidden" class="form-control" name="user_id"
						value="{{ $reservation->user->id }}">
					<button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
					<a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
