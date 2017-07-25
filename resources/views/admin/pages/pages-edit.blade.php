@extends('admin.partials.base')
@section('content')
    <h1>Edit {{ $title }}</h1><a href="/{{ $slug }}" class="btn btn-primary btn-super">View</a>
    <form method="POST" action="/admin/pages/{{ $id }}/update" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>

                    <input id="title" type="text" class="form-control" name="title" value="{{ $title }}" required
                           autofocus>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label for="slug" class="control-label">Slug</label>

                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $slug }}" required
                           autofocus>

                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @if($templates)
                    <label for="template">Choose a template</label>
                    <select name="template" id="template" class="form-control">
                        @foreach($templates as $template)
                            <option value="{{ $template }}" {{ setSelected($active_template, $template) }}>{{ ucfirst($template) }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </form>

    <form class="" method="POST" action="/admin/pages/{{ $id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group bg-danger" style="padding: 10px;">
            <strong>
                <small>WANING: Deleting the presentation removes all data from
                    the database. This action cannot be
                    undone.
                </small>
            </strong>
            <br/>
            <br/>
            <button type="submit" class="btn btn-danger">
                Delete page
            </button>
        </div>

    </form>
@endsection