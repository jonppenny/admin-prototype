@extends('admin.partials.base')
@section('content')
    <h1>Add Presentation</h1>
    <div class="row">

        <form method="POST" action="/admin/posts/{{ $id }}/update" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="col-md-8">
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

                <div class="form-group{{ $errors->has('the_content') ? ' has-error' : '' }}">
                    <label for="the_content" class="control-label">Content</label>
                    <textarea name="the_content" id="the_content" class="form-control" rows="5">{{ $the_content }}</textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="preview-image">File input</label>
                    <input type="file" name="preview_image" id="preview-image" class="preview-image">
                    <p class="help-block">Example block-level help text here.</p>
                </div>

                <div class="form-group">
                    <p>Created: {{ $created_at->format('D d F Y, H:i:s') }}<br/>
                        Updated: {{ $updated_at->format('D d F Y, H:i:s') }}</p>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="" method="POST" action="/admin/posts/{{ $id }}/delete">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $id }}">

                <div class="form-group bg-danger" style="padding: 10px;">
                    <strong>
                        <small>WANING: Deleting the post removes all data from the database. This action cannot be
                            undone.
                        </small>
                    </strong>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-danger">
                        DELETE POST
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
