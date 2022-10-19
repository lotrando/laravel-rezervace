@extends('layouts/main')

@section('title', 'Show Reservation')

@section('content')

<div class="d-flex mx-auto justify-content-center align-items-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header p-3">
				<h2 class="text-center">{{ __('Show Reservation') }}</h2>
			</div>
			<div class="card-body p-4">
				<div class="mb-3">
					<p><strong>{{ __('Department') }}:</strong> {{
						$reservation->department->department_name }}</p>
					<p><strong>{{ __('Responsible person') }}:</strong> {{
						$reservation->user->user_name }}</p>
					<p><strong>{{ __('Od') }}:</strong> {{ $reservation->date_start }}</p>
					<p><strong>{{ __('Do') }}:</strong> {{ $reservation->date_end }}</p>
					<p><strong>{{ __('Rooms') }}:</strong> {{ $reservation->rooms }}</p>
					<p><strong>{{ __('Doors') }}:</strong> {{ $reservation->doors }}</p>
					<p><strong>{{ __('Speciální požadavek') }}:</strong> {{ $reservation->specials }}
					</p>
					<p><strong>{{ __('Created at') }}:</strong> {{ $reservation->created_at }}</p>
					<p><strong>{{ __('Status') }}:</strong> {{ $reservation->status }}</p>
				</div>
				<div class="mt-3">
					<a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
