@extends('admin.partials.base')
@section('content')
    <h1>Add Presentation</h1>
    <form method="POST" action="/admin/presentations/add" enctype="multipart/form-data">
        {{ csrf_field() }}

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

        <div class="form-group">
            <label for="preview-image">File input</label>
            <input type="file" name="preview_image" id="preview-image" class="preview-image" required>
            <p class="help-block">Example block-level help text here.</p>
        </div>

        <div class="form-group{{ $errors->has('section1') ? ' has-error' : '' }}">
            <label for="section1" class="control-label">Section 1</label>
            <textarea name="section1" id="section1" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group{{ $errors->has('section1') ? ' has-error' : '' }}">
            <label for="section1" class="control-label">Section 1</label>
            <textarea name="section1" id="section1" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group{{ $errors->has('section2') ? ' has-error' : '' }}">
            <label for="section2" class="control-label">Section 2</label>
            <textarea name="section2" id="section2" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group{{ $errors->has('section3') ? ' has-error' : '' }}">
            <label for="section3" class="control-label">Section 3</label>
            <textarea name="section3" id="section3" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group{{ $errors->has('section4') ? ' has-error' : '' }}">
            <label for="section4" class="control-label">Section 4</label>
            <textarea name="section4" id="section4" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group{{ $errors->has('section5') ? ' has-error' : '' }}">
            <label for="section5" class="control-label">Section 5</label>
            <textarea name="section5" id="section5" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Add Presentation
            </button>
        </div>
    </form>
@endsection