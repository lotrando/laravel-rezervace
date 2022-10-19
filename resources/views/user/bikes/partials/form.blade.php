@csrf
<div class="row">
	<div class="mb-3 col-3">
		<label for="item_id" class="form-label">{{ __('Item') }}</label>
		<select type="text" class="form-control @error('item_id') is-invalid @enderror" id="item_id" name="item_id">
			<option value="">Vyberte předmět k zapůjčení</option>
		@foreach ($items as $item)
			<option value="{{ $item->id }}" @if(old('item_id') == $item->id) selected @endif>{{ $item->name }} - {{ $item->description }}</option>
		@endforeach
		</select>
		@error('item_id')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-2">
		<label for="date_start" class="form-label">{{ __('From') }}</label>
		<input type="date" class="form-control @error('date_start') is-invalid @enderror"
			id="date_start" name="date_start" value="{{ old('date_start') }}">
		@error('date_start')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-2">
		<label for="date_end" class="form-label">{{ __('To') }}</label>
		<input type="date" class="form-control @error('date_end') is-invalid @enderror"
			id="date_end" name="date_end" value="{{ old('date_end') }}">
		@error('date_end')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-2">
		<label for="phone" class="form-label">{{ __('Telefon (prioritně mobilní číslo)') }}</label>
		<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
			name="phone" value="{{ old('phone') }}@isset($bike){{ $bike->phone }}@endisset">
		@error('phone')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-1">
		<label for="pernum" class="form-label">{{ __('Osobní číslo') }}</label>
		<input type="text" class="form-control @error('pernum') is-invalid @enderror" id="pernum"
			name="pernum" value="{{ Auth::user()->pernum, old('pernum') }}@isset($bike){{ $bike->pernum }}@endisset">
		@error('pernum')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>
	<div class="mb-3 col-2">
		<label for="date_born" class="form-label">{{ __('Datum narození') }}</label>
		<input type="date" class="form-control @error('date_born') is-invalid @enderror" id="date_born"
			name="date_born" value="{{ Auth::user()->date_birth, old('date_born') }}@isset($bike){{ $bike->date_born }}@endisset" placeholder="Zadejte datum narození">
		@error('date_born')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
		@enderror
	</div>

</div>
@can('is-admin')
<div class="mb-3">
	<label for="status" class="form-label">Status</label>
	<select type="text" class="form-control @error('status') is-invalid @enderror" id="status"
		name="status">
		<option value="{{ $bike->status ?? 'Waiting'}}">
			{{ $bike->status ?? 'Waiting' }}
		</option>
		<option value="Vloženo">Vloženo</option>
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
<a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
<a href="../full-calendar" class="btn btn-success"><i class="fa-solid fa-calendar-days"></i> Kalendář</a>
