@extends('admin.partials.base')
@section('content')
    <h1>Edit Menu</h1>
    <form class="" method="POST" action="/admin/menus/{{ $id }}/update" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ $name }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                {{--@if($page_ids)
                    {{ $page_ids }}
                    @foreach($page_ids as $key => $value)
                        {{ $value }}
                    @endforeach
                @endif--}}

                @if($pages)
                    {{ $pages }}
                    <div class="form-group">
                        <ul>
                            @foreach($pages as $page)
                                <li><input type="checkbox" name="page_ids[{{ $page->id }}]" id="{{ $page->title }}"/>
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
                        Update
                    </button>
                </div>
            </div>
        </div>

    </form>

    <form class="" method="POST" action="/admin/menus/{{ $id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group bg-danger" style="padding: 10px;">
            <strong>
                <small>WANING: Deleting the menu removes all data from
                    the database. This action cannot be
                    undone.
                </small>
            </strong>
            <br/>
            <br/>
            <button type="submit" class="btn btn-danger">
                Delete Menu
            </button>
        </div>
    </form>
@endsection
