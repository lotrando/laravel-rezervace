@extends('layouts/main')

@section('title', 'Admin user index')

@section('content')

<div class="container-fluid d-flex mx-auto justify-content-center align-items-center">
    <div class="col-12">
        @include('partials.alerts')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Administrace uživatelů</h3>
                <!-- <a href="{{ route('admin.users.create') }}" class="btn btn-success">Nový uživatel</a> -->
            </div>
            <div class="card-body p-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Jméno</th>
                            <th scope="col">Email</th>
							<th scope="col">Role</th>
                            <th width="145px">Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="pt-3">
                                {{ $user->user_name }}
                            </td>
                            <td class="pt-3"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
							<td class="pt-3">
								@foreach ($user->roles as $role)
								<span class="badge
									@if ($role->name === 'Admin') bg-danger
									@endif
									bg-primary">
									{{ $role->name }}
								</span>
								@endforeach
							</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $user->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="delete-modal-{{ $user->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete user</h5>
                                                <button type="button" class="btn btn-sm-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Delete user, {{ $user->user_name }} ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <div x-data>
                                                    <form id="delete-user-form-{{ $user->id }}" @submit.prevent action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                        <button on-click="" class="btn btn-danger" type="submit">Delete</button>
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
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
