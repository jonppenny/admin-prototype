@extends('site.partials.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($the_content)
                    {!! $the_content !!}
                @else
                    <h1>Welcome!</h1>

                    <p>Web developer/programmer. Geek. Gamer. Star Wars nerd. Digital content manager for <a href="http://ponty.net">Pontypridd RFC</a>.</p>

                    <h2>Back soon</h2>

                    <p>I am currently ditching Wordpress and building my new site using the Laravel framework.</p>

                @endif
            </div>
        </div>
    </div>
@endsection
