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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments);
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m);
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-74293771-1', 'auto');
    ga('send', 'pageview');

</script>
<div id="app">
    @yield('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="social">
                    <a href="mailto:jon@jonppenny.co.uk" title="Email">
                        <img width="32" height="32" src="/images/iconmonstr-email-10.svg" alt="Email"/>
                    </a>
                    <a href="http://twitter.com/jonppenny" title="Twitter">
                        <img width="32" height="32" src="/images/iconmonstr-twitter-4.svg" alt="Twitter"/>
                    </a>
                    <a href="http://uk.linkedin.com/in/jonppenny" title="LinkedIn">
                        <img width="32" height="32" src="/images/iconmonstr-linkedin-4.svg" alt="LinkedIn"/>
                    </a>
                    <a href="https://github.com/jonppenny" title="Github">
                        <img width="32" height="32" src="/images/iconmonstr-github-4.svg" alt="Github"/>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <p>
                    <small>Copyright &copy; {{ date('Y') }}. All rights reserved.</small>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
