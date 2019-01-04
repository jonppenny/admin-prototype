<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Style Guide Prototype') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Style Guide Prototype') }}
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Install</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/install">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('website_name') ? ' has-error' : '' }}">
                                <label for="website_name" class="col-md-4 control-label">Website Name</label>

                                <div class="col-md-6">
                                    <input id="website_name" type="text" class="form-control" name="website_name" value="{{ old('website_name') }}" required autofocus>

                                    @if ($errors->has('website_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('website_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="form-group{{ $errors->has('admin_username') ? ' has-error' : '' }}">
                                <label for="admin-username" class="col-md-4 control-label">Admin Username</label>

                                <div class="col-md-6">
                                    <input id="admin-username" type="text" class="form-control" name="admin_username" value="{{ old('admin_username') }}" required>

                                    @if ($errors->has('admin_username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('admin_username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Install
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
