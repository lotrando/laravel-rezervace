@extends('layouts/main')

@section('title', 'Index of Reservations')

@section('content')

{{ $reservations }}

   <div class="container-fluid d-flex mx-auto justify-content-center align-items-center">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h1 class="mb-0">Reservations</h1>
				<a href="{{ route('user.reservations.create') }}" class="btn btn-success">New
					Reservation</a>
			</div>
			<div class="card-body p-4">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Username</th>
							<th scope="col">Department</th>
							<th scope="col">Reservation</th>
							<th scope="col">Rooms</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($reservations as $reservation)
						<tr>
							<th class="pt-3" scope="row">{{ $reservation->id }}</th>
							<th class="pt-3" scope="row">{{ $reservation->user->user_name }}</th>
							<th class="pt-3" scope="row">{{ $reservation->department_name }}</th>

							<td class="pt-3">
								<a href="{{ route('user.reservations.show', $reservation->id) }}">
									{{ $reservation->name }}
								</a>
							</td>
							<th class="pt-3" scope="row">{{ $reservation->rooms }}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			{{ $reservations->links() }}
		</div>
	</div>
</div>
@endsection
