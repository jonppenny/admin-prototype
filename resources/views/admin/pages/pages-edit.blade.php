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

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="the_content" class="control-label">Content</label>
                    <textarea name="the_content" id="the_content" class="form-control"
                              rows="5">{{ $the_content }}</textarea>
                </div>
                @ckeditor('the_content')
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="control-label">Publish</label>
                    <button type="submit" class="btn btn-primary form-control">
                        Edit Page
                    </button>
                </div>
                @if($templates)
                    <div class="form-group">
                        <label for="template">Choose a template</label>
                        <select name="template" id="template" class="form-control">
                            @foreach($templates as $template)
                                <option value="{{ $template }}" {{ setSelected($active_template, $template) }}>{{ ucfirst($template) }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        </div>

    </form>

    <form class="" method="POST" action="/admin/pages/{{ $id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group bg-danger" style="padding: 10px;">
            <strong>
                <small>WANING: Deleting the page removes all data from
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
