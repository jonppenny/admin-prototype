@extends('admin.partials.base')
@section('content')
    <h1>Add Post</h1>
    <form method="POST" action="/admin/posts/add" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-8">
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

                    <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required
                           autofocus>

                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="the_content" class="control-label">Content</label>
                    <textarea name="the_content" id="the_content" class="form-control" rows="5"></textarea>
                </div>
                <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
                <script>
                  CKEDITOR.replace( 'the_content' );
                </script>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Publish</label>
                    <button type="submit" class="btn btn-primary form-control">
                        Add Post
                    </button>
                </div>
                <div class="form-group">
                    <label class="control-label">Preview Image</label><br/>
                    <label for="preview-image" class="btn btn-primary">Select File</label>
                    <input type="file" name="preview_image" id="preview-image" class="preview-image" style="visibility: hidden; height: 1px;">
                    <p class="help-block">Upload an image to use as a featured image.</p>
                </div>

            </div>
        </div>
    </form>
@endsection
