@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::check())
            @endif
            @if ($data)
                <ul class="bxslider hover-effect">
                @foreach($data as $data_slide)
                    <li><div class="property_summary">
                            <h3>{{ $data_slide['title'] }}</h3>
                            <p>{{ $data_slide['description'] }}</p>
                        </div>
                        <a href="/style/view/{{ $data_slide['id'] }}"><img src="{{ asset($data_slide['img']) }}" alt="{{ $data_slide['img_alt'] }}" /></a></li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
