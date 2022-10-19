<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/cs.min.js"></script>
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<script src="{{ asset('js/app.js') }}" defer></script>

	<title>Rezervace kol a autoboxů</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Rezervace')
				}}</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					@can('logged-in')
					<li class="nav-item">
						<a class="nav-link" aria-current="page"
							href="{{ route('user.reservations.index') }}">
							{{ __('Paints') }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page"
							href="{{ route('user.bikes.index') }}">
							{{ __('Bikes') }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="https://docs.google.com/spreadsheets/d/19Tzhxrq7tVBpZ7LhZ5qEL6ehI3om3q6b/edit#gid=1690889270">
							{{ __('Pneumatiky') }}
						</a>
					</li>
					@endcan
					@can('is-admin')
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.users.index') }}">
							{{ __('Users') }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.roles.index') }}">
							{{ __('Roles') }}
						</a>
					</li>
					@endcan
				</ul>
				@auth
				<span class="navbar-text text-white mx-3">
					{{ __('Logged as') }} {{ Auth::user()->user_name }}
				</span>
				@endauth
				<div class="form-inline my-2 my-lg-0">
					@if (Route::has('login'))
					<div>
						@auth
						<a class="btn btn-outline-primary m-1" href="{{ route('profile.edit', Auth::user()->id) }}">
							{{ __('Profil') }}
						</a>
						<button type="button" class="btn btn-outline-danger m-1"
							data-bs-toggle="modal" data-bs-target="#logout-modal">
							{{ __('Logout') }}
						</button>
						@else
						<a class="btn btn-outline-primary m-1" href="{{ route('login') }}">
							{{ __('Login') }}
						</a>
						@if (Route::has('register'))
						<a class="btn btn-primary m-1" href="{{ route('register') }}">
							{{ __('Register') }}
						</a>
						@endif
						@endauth
					</div>
					@endif
				</div>
			</div>
		</div>
	</nav>
	<div class="modal fade" id="logout-modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ __('Logout') }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="{{ __('Close') }}"></button>
				</div>
				<div class="modal-body">
					<p class="text-center">{{ __('Are you sure ?') }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
						{{ __('Close') }}
					</button>
					<div x-data>
						<form @submit.prevent action="{{ route('logout') }}" method="POST">
							@csrf
							<button class="btn btn-danger" type="submit">
								{{ __('Logout') }}
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					@include('partials.alerts')
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h2 class="mb-0">{{ __('Rezervace kol a autoboxů') }}</h2>
						<div>
							<a href="full-calendar" class="btn btn-success"><i class="fa-solid fa-calendar-days"></i> Kalendář</a>
							<a href="{{ route('user.bikes.create') }}" class="btn btn-success">
								{{ __('Nová rezervace') }}
							</a>
						</div>
						</div>
						<div class="card-body p-4">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">@sortablelink('item.name', __('Rezervavace'))</th>
										<th scope="col">@sortablelink('date_start', __('Od'))</th>
										<th scope="col">@sortablelink('date_end', __('Do'))</th>
										<th scope="col">@sortablelink('created_at', __('Vytvořeno'))</th>
										<th scope="col">@sortablelink('user.user_name', __('Nájemce'))</th>
										<th scope="col">{{ __('Action') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($bookings as $booking)

									<tr>
										<td class="pt-3" scope="row">
											{{ $booking->id }}</td>
										<td class="pt-3" scope="row">
											{{ $booking->item->name }}
										</td>
										<td class="pt-3" scope="row">
											{{ date('d. m. Y', strtotime($booking->date_start)) }}
										</td>
										<td class="pt-3" scope="row">
											{{ date('d. m. Y', strtotime($booking->date_end)) }}
										</td>
										<td class="pt-3" scope="row">
											{{ $booking->created_at }}
										</td>
										<td class="pt-3" scope="row">
											{{ $booking->user->user_name }}
										</td>
										<td width="200px" align="right">
											@if ($booking->user_id === Auth::user()->id)
											<a href="{{ route('user.bikes.show', $booking->id) }}"
												class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i>
											</a>
											<a href="{{ route('user.bikes.edit', $booking->id) }}"
												class="btn btn-primary"><i
													class="fa-solid fa-pen-to-square"></i>
											</a>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal"
												data-bs-target="#delete-modal-{{ $booking->id }}"><i
													class="fa-solid fa-trash"></i>
											</button>
											@else
											@can('is-admin')
											<a href="{{ route('user.bikes.show', $booking->id) }}"
												class="btn btn-secondary"><i class="fa-solid fa-file-pdf"></i>
											</a>
											<a href="{{ route('user.bikes.edit', $booking->id) }}"
												class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>
											</a>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal"
												data-bs-target="#delete-modal-{{ $booking->id }}"><i class="fa-solid fa-trash"></i>
											</button>
											@endcan
											@endif
										</td>
									</tr>
									<div class="modal fade" id="delete-modal-{{ $booking->id }}" tabindex="-1">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">{{ __('Delete booking') }}</h5>
													<button type="button" class="btn btn-sm-close"
														data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p class="text-center">{{ __('Delete booking') }} ?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-bs-dismiss="modal">{{ __('Back') }}</button>
													<div x-data>
														<form id="delete-user-form-{{ $booking->id }}"
															@submit.prbooking
															action="{{ route('user.bikes.destroy', $booking->id) }}"
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
						{{ $bookings->links() }}
					</div>

				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function() {
			var events = @json($bookings);
			$('#calendar').fullCalendar({
				header: {
					'left': 'prev, today',
					'center': 'title',
					'right': 'next'
				},
				lang: 'cs',
				events: events,
				selectable: true,
			})
		});
	</script>
</body>

</html>


