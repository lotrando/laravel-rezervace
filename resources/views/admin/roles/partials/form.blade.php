@csrf
<div class="mb-3">
	<label for="name" class="form-label">Název</label>
	<input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
	value="{{ old('name') }}@isset($role){{ $role->name }}@endisset">
	@error('name')
		<span class="invalid-feedback" role="alert">
			{{ $message }}
		</span>
	@enderror
</div>
<button type="submit" class="btn btn-primary">{{ $action }}</button>