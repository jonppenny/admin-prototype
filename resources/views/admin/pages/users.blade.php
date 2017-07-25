@extends('admin.partials.base')
@section('content')
    <h1>Users</h1>
    <a href="/admin/users/add" class="btn btn-primary btn-super">Add User</a>
    @if ($users)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        @if($user->user_avatar)
                            <img src="/uploads/{{ $user->user_avatar }}" alt="{{ $user->name }}" style="margin-right: 10px;display: inline-block; width: 30px; border-radius: 50%;"/>
                        @else
                            <img src="/images/default-avatar.png" alt="{{ $user->name }}" style="margin-right: 10px; display: inline-block; width: 30px; border-radius: 50%;"/>
                        @endif
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                        <form class="" method="POST" action="/admin/users/{{ $user->id }}/delete" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    @endif
@endsection
