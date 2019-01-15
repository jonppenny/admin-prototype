@extends('site.partials.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($the_content)
                    {!! $the_content !!}
                @else
                @endif
            </div>
        </div>
    </div>
@endsection
