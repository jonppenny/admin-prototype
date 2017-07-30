<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-right" style="margin: 9px 0;">
                            <input type="text" class="form-control" placeholder="Search...">
                        </form>
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            @if (Auth::user()->user_avatar)
                                <img style="display: block; margin: 9px 0; width: 30px; border-radius: 50%;" src="/uploads/{{ Auth::user()->user_avatar }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img style="display: block; margin: 9px 0; width: 30px; border-radius: 50%;" src="/images/default-avatar.png" alt="{{ Auth::user()->name }}">
                            @endif
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="{{ setActive('admin') }}"><a href="/admin">Dashboard</a></li>
                    <li class="{{ setActive('admin/posts*') }}">
                        <a href="/admin/posts">Posts</a>
                        <ul>
                            <li class="{{ setActive('admin/posts') }}"><a href="/admin/posts">All
                                    Posts</a></li>
                            <li class="{{ setActive('admin/posts/add') }}"><a href="/admin/posts/add">Add
                                    Post</a></li>
                        </ul>
                    </li>
                    <li class="{{ setActive('admin/pages*') }}">
                        <a href="/admin/pages">Pages</a>
                        <ul>
                            <li class="{{ setActive('admin/pages') }}"><a href="/admin/pages">All
                                    Pages</a></li>
                            <li class="{{ setActive('admin/pages/add') }}"><a href="/admin/pages/add">Add
                                    Page</a></li>
                        </ul>
                    </li>
                    <li class="{{ setActive('admin/users*') }}">
                        <a href="/admin/users">Users</a>
                        <ul>
                            <li class="{{ setActive('admin/users') }}"><a href="/admin/users">All Users</a></li>
                            <li class="{{ setActive('admin/users/add') }}"><a href="/admin/users/add">Add Users</a></li>
                        </ul>
                    </li>
                    <li class="{{ setActive('admin/menus*') }}">
                        <a href="/admin/menus">Menus</a>
                    </li>
                    <li class="{{ setActive('admin/settings*') }}">
                        <a href="/admin/settings">Settings</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('content')
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-right">
                    {{ displayVersion() }}
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
