@extends('admin.partials.base')
@section('content')
    <h1>Menus</h1>
    <a href="/admin/menus/add" class="btn btn-primary btn-super">Add Menu</a>
    @if ($menus)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>
                        {{ $menu->id }}
                    </td>
                    <td>{{ $menus->name }}</td>
                    <td>
                        <a href="/admin/menus/{{ $menu->id }}/edit" class="btn btn-primary">Edit</a>
                        <form class="" method="POST" action="/admin/menus/{{ $menu->id }}/delete" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $menu->id }}">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $menus->links() }}
    @endif
@endsection
