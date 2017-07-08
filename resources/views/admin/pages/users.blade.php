@extends('admin.partials.base')
@section('content')
    <h1>Dashboard</h1>
    @if ($users)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>Admin</td>
                    <td><a href="{{ $user->id }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
