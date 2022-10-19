@extends('layouts/main')

@section('title', 'Show Reservation')

@section('content')

	<div class="d-flex mx-auto justify-content-center align-items-center">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header p-3">
					<h2 class="text-center">{{ __('Show Reservation') }}</h2>
				</div>
				<div class="card-body p-4">
					<div class="mb-3">
						<p><strong>{{ __('Item') }}:</strong> {{ $bike->item->name }}</p>
						<p><strong>{{ __('User') }}:</strong> {{ $bike->user->user_name }}</p>
						<p><strong>{{ __('Phone') }}:</strong> {{ $bike->phone }}</p>
						<p><strong>{{ __('From') }}:</strong> {{ date('d. m. Y', strtotime($bike->date_start)) }}</p>
						<p><strong>{{ __('To') }}:</strong> {{ date('d. m. Y', strtotime($bike->date_end)) }}</p>
						<p><strong>{{ __('Created at') }}:</strong> {{ $bike->created_at }}</p>
					</div>
					<div class="mt-3">
						<a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
