@extends('admin.partials.base')
@section('content')
    <h1>Pages</h1><a href="/admin/pages/add" class="btn btn-primary btn-super">Add Page</a>
    @if($pages)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Last Updated</th>
                <th>Manage</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->created_at->format('D d M Y, h:m:s') }}</td>
                    <td>{{ $page->updated_at->format('D d M Y, h:m:s') }}</td>
                    <td>
                        <a href="/admin/pages/{{ $page->id }}/edit" class="btn btn-primary">Edit</a>
                        <form class="" method="POST" action="/admin/pages/{{ $page->id }}/delete" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $page->id }}">

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="/{{ $page->slug }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection