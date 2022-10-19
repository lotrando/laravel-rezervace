@csrf
<div class="mb-3">
    <label for="pernum" class="form-label">Osobní číslo</label>
    <input type="text" class="form-control @error('pernum') is-invalid @enderror" id="pernum" name="pernum" value="{{ old('pernum') }}@isset($user){{ $user->pernum }}@endisset" readonly>
</div>
<div class="mb-3">
    <label for="user_name" class="form-label">Příjmení Jméno, Titul</label>
    <input type="user_name" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}@isset($user){{ $user->user_name }}@endisset">
    @error('user_name')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">E-mailová addresa</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}@isset($user){{ $user->email }}@endisset">
    @error('email')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="date_birth" class="form-label">Datum narození</label>
    <input type="date" class="form-control @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" value="{{ old('date_birth') }}@isset($user){{ $user->date_birth }}@endisset">
    @error('date_birth')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="password" class="form-label">Heslo</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $action }}</button>
<a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
