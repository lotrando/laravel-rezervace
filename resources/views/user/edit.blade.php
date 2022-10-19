@extends('layouts/main')

@section('title', 'Uprvit profil')

@section('content')

    <div class="d-flex mx-auto justify-content-center align-items-center">

        <div class="col-4">

            <div class="card">
                <div class="card-header p-3">
                    <h2 class="text-center">Upravit Profil Uživatele</h2>
                </div>
                <div class="card-body p-4">
                    @include('partials.alerts')
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @method('PATCH')
                    @include('user.partials.form', ['action' => 'Uložit'])
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection