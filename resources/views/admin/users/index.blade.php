@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">User List</h2>

    <form method="GET" class="form-inline mb-3">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search by name or email">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div class="mb-3">
        <a href="{{ route('admin.users.export', ['search' => request('search')]) }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Export to Excel
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Users</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $users->appends(request()->query())->links() }}
    </div>
</div>
@endsection
