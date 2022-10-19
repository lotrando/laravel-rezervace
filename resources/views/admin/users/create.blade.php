@extends('layouts/main')

@section('title', 'Create User')

@section('content')

	<div class="d-flex mx-auto justify-content-center align-items-center">
		<div class="col-4">
			<div class="card">
				<div class="card-header p-3">
					<h2 class="text-center">Vytvořit uživatele</h2>
				</div>
				<div class="card-body p-4">
					<form action="{{ route('admin.users.store') }}" method="POST">
					@include('admin.users.partials.form', ['action' => 'Create'])
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection