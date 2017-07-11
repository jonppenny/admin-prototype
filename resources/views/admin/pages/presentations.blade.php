@extends('admin.partials.base')
@section('content')
    <h1>Presentations</h1>
    @if($presentations)
        <table class="table table-striped">
            <thead class="thead-default">
            <tr>
                <th>Preview</th>
                <th>Title</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($presentations as $presentation)
                <tr>
                    <td width="200">
                        @if($presentation->preview_image)
                            <img src="/uploads/{{ $presentation->preview_image }}" alt="{{ $presentation->title }}"/>
                        @else
                            <img src="/images/default.jpg" alt="{{ $presentation->title }}"/>
                        @endif
                    </td>
                    <td>{{ $presentation->title }}</td>
                    <td>
                        <a href="/admin/presentations/edit/{{ $presentation->id }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection