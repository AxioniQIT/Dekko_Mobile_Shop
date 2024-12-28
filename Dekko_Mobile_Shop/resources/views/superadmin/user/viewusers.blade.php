@extends('layouts.superadmin')
@section('title', 'Users')
@section('content')
@section('content')
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3>Users List</h3>
                </div>
                <hr>
                <div class="card-header pb-0">
                    <button class="btn btn-sm btn-primary me-2 mb-3" data-url="{{ route('superadmin.user.create') }}"
                        data-size="md" data-ajax-popup="true" data-title="Add User">
                        <i class="las la-plus" title="Add User"></i> Add User
                    </button>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td data-label="Action">
                                            <button class="btn btn-sm btn-success"
                                                data-url="{{ route('superadmin.user.edit', ['user' => $user->user_id]) }}"
                                                data-size="md" data-ajax-popup="true" data-title="Edit User">
                                                <i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit User"></i>
                                            </button>
                                            <form
                                                action="{{ route('superadmin.user.destroy', ['user' => $user->user_id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger show_confirm">
                                                    <i class="fas fa-trash-alt" data-bs-toggle="tooltip" title="Delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End of new table structure -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
