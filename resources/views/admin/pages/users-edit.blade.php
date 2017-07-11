@extends('admin.partials.base')
@section('content')
    <h1>Edit User</h1>
    @if($users)
        @foreach($users as $user)
            <form class="" method="POST" action="/admin/users/add">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>

                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required
                           autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail
                        Address</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                           required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirm
                        Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>

                <div class="form-group">
                    <label for="role" class="control-label">User role</label>

                    <select name="role" id="role" class="form-control">
                        <option>Please Select</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>

            <form class="" method="POST" action="/admin/users/delete/{{ $user->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $user->id }}">

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
                        DELETE USER
                    </button>
                </div>

            </form>
        @endforeach
    @endif
@endsection