@extends('admin.partials.base')
@section('content')
    <h1>Posts</h1>
    @if($posts)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>Preview</th>
                <th>Title</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td width="200">
                        @if($post->preview_image)
                            <img src="/uploads/{{ $post->preview_image }}" alt="{{ $post->title }}"/>
                        @else
                            <img src="/images/default.jpg" alt="{{ $post->title }}"/>
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection