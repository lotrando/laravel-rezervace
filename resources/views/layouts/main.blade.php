<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/all.min.css') }}">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<title>@yield('title')</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Rezervace') }}</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon text-white"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					@can('logged-in')
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('user.reservations.index') }}">
							{{ __('Paints') }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('user.bikes.index') }}">
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
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
				</div>
				<div class="modal-body">
					<p class="text-center">{{ __('Are you sure ?') }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
						{{ __('Back') }}
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
			@yield('content')
		</div>
	</section>
</body>

</html>
