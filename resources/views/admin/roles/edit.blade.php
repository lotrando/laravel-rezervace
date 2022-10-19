@extends('layouts/main')

@section('title', 'Edit Role')

@section('content')

	<div class="d-flex mx-auto justify-content-center align-items-center">
		<div class="col-4">
			<div class="card">
				<div class="card-header p-3">
					<h2 class="text-center">Editace role</h2>
				</div>
				<div class="card-body p-4">
					<form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
					@method('PATCH')
					@include('admin.roles.partials.form', ['action' => 'Přejmenovat'])
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection