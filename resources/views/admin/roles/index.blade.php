@extends('layouts/main')

@section('title', 'Admin role index')

@section('content')

<div class="container-fluid d-flex mx-auto justify-content-center align-items-center">
    <div class="col-12">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Administrace Rolí</h3>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Nová role</a>
            </div>
            <div class="card-body p-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Název role</th>
                            <th width="160px">Akce</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="pt-3">
                                {{ $role->name }}
                            </td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary">Upravit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $role->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="delete-modal-{{ $role->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Role</h5>
                                                <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Delete role, {{ $role->name }} ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zpět</button>
                                                <div x-data>
                                                    <form id="delete-user-form-{{ $role->id }}" @submit.prevent action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
                                                        <button on-click="" class="btn btn-danger" type="submit">Odstranit</button>
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $roles->links() }}
        </div>
    </div>
</div>

@endsection
