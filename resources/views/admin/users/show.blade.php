@extends('layouts/main')

@section('title', 'Show User')

@section('content')

<div class="d-flex mx-auto justify-content-center align-items-center">
    <div class="col-4">
        <div class="card">
            <div class="card-header p-3">
                <h2 class="text-center">Detail uživatele</h2>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <p>{{ $user->user_name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->password }}</p>
                    <p>{{ $user->remember_token }}</p>
                    <p>{{ $user->created_at }}</p>
                    <p>{{ $user->updated_at }}</p>
                </div>
                <div class="mb-3">
                    <label for="form-check-input" class="form-label">Role</label>
                    @foreach ($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" name="roles[]" type="checkbox" disabled @isset($user) @if(in_array( $role->id, $user->roles->pluck('id')->toArray()
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
                <div class="mt-3">
                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Zpět</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
