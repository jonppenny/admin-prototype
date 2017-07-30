@extends('admin.partials.base')
@section('content')
    <h1>Edit Post</h1><a href="/post/{{ $slug }}" class="btn btn-primary btn-super">View</a>

    <form method="POST" action="/admin/posts/{{ $id }}/update" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
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

                <div class="form-group{{ $errors->has('the_content') ? ' has-error' : '' }}">
                    <label for="the_content" class="control-label">Content</label>
                    <textarea name="the_content" id="the_content" class="form-control"
                              rows="5">{{ $the_content }}</textarea>
                </div>
                @ckeditor('the_content')
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Publish</label>
                    <button type="submit" class="btn btn-primary form-control">
                        Edit Post
                    </button>
                </div>
                <div class="form-group">
                    <p>Created: {{ $created_at->format('D d F Y, H:i:s') }}<br/>
                        Updated: {{ $updated_at->format('D d F Y, H:i:s') }}</p>
                </div>

                <div class="form-group">
                    <label class="control-label">Preview Image</label><br/>
                    @if($preview_image)
                        <p><img src="/uploads/{{ $preview_image }}" alt="{{ $title }}" style="margin-right: 10px;"/></p>
                    @endif
                    <label for="preview-image" class="btn btn-primary">Select File</label>
                    <input type="file" name="preview_image" id="preview-image" class="preview-image"
                           style="visibility: hidden; height: 1px;">
                    <p class="help-block">Upload an image to use as a featured image.</p>
                </div>
            </div>
        </div>
    </form>

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
                        Delete Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
