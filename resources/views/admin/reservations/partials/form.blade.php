@csrf
<div class="row">
	<div class="mb-3 col-4">
		<label for="name" class="form-label">Reservation Name</label>
		<input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
			name="name"
			value="{{ $reservation->name }}">
		@error('name')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-8">
		<label for="department_id" class="form-label">Department</label>
		<select type="text" class="form-control @error('department_id') is-invalid @enderror"
			id="department_id" name="department_id">
			<option value="{{ $reservation->department_id ?? ' ' }}">
				{{ $reservation->department->department_code ?? ' ' }} -
				{{ $reservation->department->department_name ?? 'Choose department ...' }}
			</option>
			@foreach ( $departments as $department )
			<option value="{{ $department->id }}">{{ $department->department_code }} - {{
				$department->department_name }}</option>
			@endforeach
		</select>
		@error('department_id')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
</div>
<div class="row">
	<div class="mb-3 col-6">
		<label for="date_start" class="form-label">Od</label>
		<input type="text" class="form-control @error('date_start') is-invalid @enderror"
			id="date_start" name="date_start"
			value="{{ $reservation->date_start }}">
		@error('date_start')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-6">
		<label for="date_end" class="form-label">Do</label>
		<input type="text" class="form-control @error('date_end') is-invalid @enderror"
			id="date_end" name="date_end"
			value="{{ $reservation->date_end }}" disabled>
		@error('date_end')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
</div>
<div class="mb-3">
	<label for="rooms" class="form-label">{{ __('Rooms') }}</label>
	<input type="text" class="form-control @error('rooms') is-invalid @enderror" id="rooms"
		name="rooms"
		value="{{ old('rooms') }}@isset($reservation){{ $reservation->rooms }}@endisset" disabled>
	@error('rooms')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
<div class="mb-3">
	<label for="doors" class="form-label">{{ __('Doors') }}</label>
	<input type="text" class="form-control @error('doors') is-invalid @enderror" id="doors"
		name="doors"
		value="{{ old('doors') }}@isset($reservation){{ $reservation->doors }}@endisset">
	@error('doors')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
<div class="mb-3">
	<label for="specials" class="form-label">{{ __('Specials') }}</label>
	<input type="text" class="form-control @error('specials') is-invalid @enderror" id="specials"
		name="specials"
		value="{{ old('specials') }}@isset($reservation){{ $reservation->specials }}@endisset">
	@error('specials')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
<div class="mb-3">
	<label for="status" class="form-label">Status</label>
	<select type="text" class="form-control @error('status') is-invalid @enderror" id="status"
		name="status">
		<option value="{{ $reservation->status ?? 'Waiting'}}">
			{{ $reservation->status ?? 'Waiting' }}
		</option>
		@can('is-admin')
		<option value="Waiting">Waiting</option>
		<option value="Approved">Approved</option>
		@endcan
	</select>
	@error('status')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
<input type="hidden" class="form-control" name="user_id" value="{{ $reservation->user->id ?? auth()->user()->id }} @can('is-admin'){{ auth()->user()->id }}@endcan">
<button type="submit" class="btn btn-primary">{{ $action }}</button>
