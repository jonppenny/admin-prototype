@php
    // Template Name: Default
@endphp
@extends('site.partials.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $title }}</h1>
                @if($the_content)
                    {!! $the_content !!}
                @endif
            </div>
        </div>
    </div>
@endsection