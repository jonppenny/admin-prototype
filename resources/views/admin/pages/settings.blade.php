@extends('admin.partials.base')
@section('content')
    <h1>Settings</h1>
    <form method="POST" action="/admin/settings/update" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @if($pages)
                    <div class="form-group row">
                        <label for="page" class="col-md-4 col-form-label">Homepage page.</label>
                        <div class="col-md-8">
                            <select name="page" id="page" class="form-control">
                                <option value="">Please select</option>
                                @foreach($pages as $page)
                                    <option value="{{ $page->id }}">{{ ucfirst($page->title) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Save Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection