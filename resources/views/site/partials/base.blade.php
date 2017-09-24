<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Style Guide Prototype') }}</title>

    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/foundation-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74293771-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="app">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ config('app.name', 'Jon P Penny') }}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                {{ displayMenu() }}
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="social text-right">
                        <a href="mailto:jon@jonppenny.co.uk" title="Email" class="fi-mail"></a>
                        <a href="http://twitter.com/jonppenny" title="Twitter" class="fi-social-twitter"></a>
                        <a href="http://uk.linkedin.com/in/jonppenny" title="LinkedIn" class="fi-social-linkedin"></a>
                        <a href="https://github.com/jonppenny" title="Github" class="fi-social-github"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <a href="/privacy" title="Privacy Policy">
                            <small>Privacy Policy</small>
                        </a>
                    </nav>
                </div>
                <div class="col-md-6 text-right">
                    <p>
                        <small>Copyright &copy; {{ date('Y') }}. All rights reserved.</small>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
