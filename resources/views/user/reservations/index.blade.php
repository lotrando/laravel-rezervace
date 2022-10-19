@extends('layouts/main')

@section('title', 'Rezervace malování')

@section('content')

<div class="container-fluid d-flex mx-auto justify-content-center align-items-center">
	<div class="col-12">
		@include('partials.alerts')
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h2 class="mb-0">{{ __('Paint Reservations') }}</h2>
				<a href="{{ route('user.reservations.create') }}" class="btn btn-success">
					{{ __('New Reservation') }}
				</a>
			</div>
			<div class="card-body p-4">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">@sortablelink('department.department_name', __('Department'))</th>
							<th scope="col">@sortablelink('user.user_name', __('Odpovědná osoba'))</th>
							<th scope="col">@sortablelink('date_start', __('Od'))</th>
							<th scope="col">@sortablelink('date_end', __('Do'))</th>
							<th scope="col">{{ __('Rooms') }}</th>
							{{-- 						
							<th scope="col">{{ __('Doors') }}</th>
							<th scope="col">{{ __('Specials') }}</th>
							--}}
							<th scope="col">{{ __('Created at') }}</th>
							<th scope="col">{{ __('Status') }}</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($reservations as $reservation)
						<tr class="@if ($reservation->status === 'Schváleno')
							table-success @endif ">
							<td class="pt-3" scope="row">
								{{ $reservation->id }}
							</td>
							<td class="pt-3" scope="row">
								{{ $reservation->department->department_name }}
							</td>
							<td class="pt-3" scope="row">
								{{ $reservation->user->user_name }}
							</td>
							<td class="pt-3" scope="row">
								{{ date('d. m. Y', strtotime($reservation->date_start)) }}
							</td>
							<td class="pt-3" scope="row">
								{{ date('d. m. Y', strtotime($reservation->date_end)) }}
							</td>
							<td class="pt-3" scope="row">
								{{ $reservation->rooms }}
							</td>
{{-- 							<td class="pt-3" scope="row">
								{{ $reservation->doors }}
							</td>
							<td class="pt-3" scope="row">
								{{ $reservation->specials }}
							</td> --}}
							<td class="pt-3" scope="row">
								{{ $reservation->created_at }}
							</td>
							<td class="pt-3" scope="row">
								{{ $reservation->status }}
							</td>
							<td width="200px" align="right">
								<a href="{{ route('user.reservations.show', $reservation->id) }}"
									class="btn btn-secondary"><i class="fa-regular fa-eye"></i></a>
								@if ($reservation->user_id === Auth::user()->id and
								$reservation->status === 'Vloženo' )
								<a href="{{ route('user.reservations.edit', $reservation->id) }}"
									class="btn btn-primary"><i
										class="fa-solid fa-pen-to-square"></i>
								</a>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#delete-modal-{{ $reservation->id }}"><i
										class="fa-solid fa-trash"></i>
								</button>
								@else
								@can('is-admin')
								<a href="{{ route('user.reservations.edit', $reservation->id) }}"
									class="btn btn-primary"><i
										class="fa-solid fa-pen-to-square"></i></a>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal"
									data-bs-target="#delete-modal-{{ $reservation->id }}"><i
										class="fa-solid fa-trash"></i>
								</button>
								@endcan
								@endif
							</td>
						</tr>
						<div class="modal fade" id="delete-modal-{{ $reservation->id }}"
							tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">{{ __('Delete reservation') }}</h5>
										<button type="button" class="btn btn-sm-close"
											data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p class="text-center">{{ __('Delete reservation') }} ?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">{{ __('Back') }}</button>
										<div x-data>
											<form id="delete-user-form-{{ $reservation->id }}"
												@submit.prevent
												action="{{ route('user.reservations.destroy', $reservation->id) }}"
												method="POST">
												<button on-click="" class="btn btn-danger"
													type="submit">{{ __('Delete') }}</button>
												@csrf
												@method('DELETE')
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
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
