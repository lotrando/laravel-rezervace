@extends('layouts/main')

@section('title', 'Create Reservation')

@section('content')
	<div class="d-flex mx-auto justify-content-center align-items-center">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header p-3">
					<h2 class="text-center">{{ __('Create Reservation') }}</h2>
				</div>
				<div class="card-body p-4">
					@include('partials.alerts')
					<form action="{{ route('user.bikes.store') }}" method="POST">
					@include('user.bikes.partials.form', ['action' => 'Vytvořit'])
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
