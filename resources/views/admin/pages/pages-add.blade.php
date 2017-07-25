@extends('admin.partials.base')
@section('content')
    <h1>Add Page</h1>
    <form method="POST" action="/admin/pages/add" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>

                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required
                           autofocus>

                    @if ($errors->has('title'))
                        <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label for="slug" class="control-label">Slug</label>

                    <input id="slug" type="text" class="form-control" name="slug" value="{{ old('title') }}" required
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
                    <select name="template" id="template" class="form-control" required>
                        @foreach($templates as $template)
                            <option value="{{ $template }}">{{ ucfirst($template) }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Add Page
            </button>
        </div>
    </form>
@endsection