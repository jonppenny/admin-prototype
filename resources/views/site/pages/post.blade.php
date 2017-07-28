@extends('site.partials.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <div>
                    {!! json_decode($post->the_content) !!}
                </div>
            </div>
        </div>
    </div>
@endsection