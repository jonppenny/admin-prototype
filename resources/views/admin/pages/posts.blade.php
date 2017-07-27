@extends('admin.partials.base')
@section('content')
    <h1>Posts</h1><a href="/admin/posts/add" class="btn btn-primary btn-super">Add Post</a>
    @if($posts)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at->format('D d F Y, H:i:s') }}</td>
                    <td>{{ $post->updated_at->format('D d F Y, H:i:s') }}</td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                        <form class="" method="POST" action="/admin/posts/{{ $post->id }}/delete" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endif
@endsection