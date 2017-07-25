@extends('admin.partials.base')
@section('content')
    <h1>Edit User</h1>
    <form class="" method="POST" action="/admin/users/{{ $id }}/update" enctype="multipart/form-data">
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

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail
                        Address</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ $email }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirm
                        Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="role" class="control-label">User role</label>

                    <select name="role" id="role" class="form-control">
                        <option value="">Please Select</option>
                        <option value="admin" {{ setSelected($role, 'admin') }}>Admin</option>
                        <option value="manager" {{ setSelected($role, 'manager') }}>Manager</option>
                        <option value="user" {{ setSelected($role, 'user') }}>User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Avatar Image</label><br/>
                    @if($user_avatar)
                        <img src="/uploads/{{ $user_avatar }}" alt="{{ $name }}" style="margin-right: 10px;"/>
                    @else
                        <img src="/images/default-avatar.png" alt="{{ $name }}" style="margin-right: 10px;"/>
                    @endif
                </div>

                <div class="form-group">
                    <label for="user-avatar" class="btn btn-primary">Select file</label>
                    <input type="file" name="avatar_image" id="user-avatar" class="user-avatar" style="visibility: hidden; height: 1px;">
                    <p class="help-block">Upload an image to use as an avatar.</p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </form>

    <form class="" method="POST" action="/admin/users/{{ $id }}/delete">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group bg-danger" style="padding: 10px;">
            <strong>
                <small>WANING: Deleting the user removes all data from
                    the database. This action cannot be
                    undone.
                </small>
            </strong>
            <br/>
            <br/>
            <button type="submit" class="btn btn-danger">
                Delete user
            </button>
        </div>
    </form>
@endsection