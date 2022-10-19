@csrf
<div class="mb-3">
    <label for="user_name" class="form-label">Name</label>
    <input type="user_name" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}@isset($user){{ $user->user_name }}@endisset">
    @error('user_name')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}@isset($user){{ $user->email }}@endisset">
    @error('email')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
@if($action == 'Create')
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
    @enderror
</div>
@endif
<div class="mb-3">
    <label for="form-check-input" class="form-label">Roles</label>
    @foreach ($roles as $role)
    <div class="form-check">
        <input class="form-check-input" name="roles[]" type="checkbox" @isset($user) @if(in_array( $role->id, $user->roles->pluck('id')->toArray()
        ))
        checked
        @endif
        @endisset
        value="{{ $role->id }}"
        id="{{ $role->name }}">
        </input>
        <label class="form-check-label" for="{{ $role->id }}">
            {{ $role->name }}</label>
    </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">{{ $action }}</button>
