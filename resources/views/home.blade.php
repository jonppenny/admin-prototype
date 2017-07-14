@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::check())
            @endif
        </div>
    </div>
</div>
@endsection
