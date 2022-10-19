@extends('layouts/main')

@section('title', 'Detail Role')

@section('content')

	<div class="d-flex mx-auto justify-content-center align-items-center">
			<div class="col-4">
				<div class="card">
					<div class="card-header p-3">
						<h2 class="text-center">Detail Role</h2>
					</div>
					<div class="card-body p-4">
						<div class="mb-3">
							<p>{{ $role->name }}</p>
						</div>	
						<div class="mt-3">
							<a class="btn btn-secondary" href="{{ url()->previous() }}">Zpět</a>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection