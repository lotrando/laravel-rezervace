@csrf
<div class="row">
	<div class="mb-3 col-12">
		<label for="department_id" class="form-label">{{ __('Department') }}</label>
		<select type="text" class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
			<option value="">Vyberte oddělení</option>
		@foreach ($departments as $department)
			<option value="{{ $department->id }}" @if(old('department_id') == $department->id) selected @endif>{{ $department->department_code }} - {{ $department->department_name }}</option>
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
		<label for="date_start" class="form-label">{{ __('From') }}</label>
		<input type="date" class="form-control @error('date_start') is-invalid @enderror"
			id="date_start" name="date_start" value="{{ old('date_start') }}">
		@error('date_start')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-6">
		<label for="date_end" class="form-label">{{ __('To') }}</label>
		<input type="date" class="form-control @error('date_end') is-invalid @enderror"
			id="date_end" name="date_end" value="{{ old('date_end') }}">
		@error('date_end')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
</div>
<div class="row">
	<div class="mb-3 col-12">
		<label for="rooms" class="form-label">{{ __('Rooms') }}<span class="text-muted"> - ( Vypište čísla jednotlivých místností, které chcete vymalovat. V případe malování celého oddělení zadejte "celé oddělení" )</span></label>
		<input type="text" class="form-control @error('rooms') is-invalid @enderror" id="rooms"
			name="rooms"
			value="{{ old('rooms') }}@isset($reservation){{ $reservation->rooms }}@endisset">
		@error('rooms')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
</div>
<div class="mb-3">
	<label for="specials" class="form-label">{{ __('Specials') }}<span class="text-muted"> - ( Vypište v případě malování speciálních věcí jako jsou zárubně, žebřiny, apod. )</span></label>
	<input type="text" class="form-control @error('specials') is-invalid @enderror" id="specials"
		name="specials"
		value="{{ old('specials') }}@isset($reservation){{ $reservation->specials }}@endisset">
	@error('specials')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
@can('is-admin')
<div class="mb-3">
	<label for="status" class="form-label">Status</label>
	<select type="text" class="form-control @error('status') is-invalid @enderror" id="status"
		name="status">
		<option value="{{ $reservation->status ?? 'Waiting'}}">
			{{ $reservation->status ?? 'Vloženo' }}
		</option>
		<option value="Schváleno">Schváleno</option>
	</select>
	@error('status')
	<span class="invalid-feedback" role="alert">
		{{ $message }}
	</span>
	@enderror
</div>
@endcan
<input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
<input type="hidden" class="form-control" name="status" value="Vloženo">
<button type="submit" class="btn btn-primary">{{ $action }}</button>
<a class="btn btn-secondary" href="{{ route('user.reservations.index') }}">{{ __('Back') }}</a>
