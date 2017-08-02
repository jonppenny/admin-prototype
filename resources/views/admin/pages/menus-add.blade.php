@extends('admin.partials.base')
@section('content')
    <h1>Add Menu</h1>
    <div>
        <form method="POST" action="/admin/menus/add" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>

                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    @if($pages)
                        <div class="form-group">
                            <ul>
                            @foreach($pages as $page)
                                <li><input type="checkbox" name="{{ $page->id }}" id="{{ $page->title }}"/>
                                    <label for="{{ $page->title }}">{{ $page->title }}</label></li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="control-label">Publish</label>
                        <button type="submit" class="btn btn-primary form-control">
                            Add Menu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection