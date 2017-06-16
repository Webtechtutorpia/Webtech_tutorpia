<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <title>{{ config('app.name', 'Tutorpia') }}</title>
    <link rel="icon" type="image/jpg" href="images/euleicon.jpg">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <noscript>Diese Webseite funktioniert nur mit Javascript</noscript>
</head>
<body>
<header>


    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid bg-success">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{--<img style="max-width: 20px; max-height: 20px;" src="images/eule.jpg">--}}
                        {{ config('app.name', 'Tutorpia') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" onmouseover="hoverselectednavbar()">
                    <!-- Left Side Of Navbar -->
                    {{--Unterschiedliche Navbar für registrierte und gäste--}}
                   @if (Auth::check())
                        <ul class="nav navbar-nav">
                            <li role="presentation" name="Übersicht"><a href="/Activity">Übersicht</a></li>
                            <li role="presentation" name="Kurse"><a href="/Kurse">Kurse</a></li>
                            @if(Auth::user()->rolle == 'admin' )

                            <li role="presentation" name="Admin"><a href="/admin">Admin</a></li>
                            @endif
                            {{--@if(Auth::user()->rolle=='admin')--}}
                            {{--<li role="presentation" name="Abgaben"><a href="/Tutor">Abgaben</a></li>--}}
                            {{--@if (Auth::user()->rolle=="Professor")--}}
                                {{--<li role="presentation"name="Profmodus"><a href="/Professor">Professorenmodus</a></li>--}}
                            {{--@else--}}
                                {{--<li role="presentation" name="Aufgaben"><a href="/Aufgabenansicht">Aufgaben</a></li>--}}
                            {{--@endif--}}
                        </ul>

                @endif
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a  href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registrierung</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<main>

    @yield('content')

    @section('test')
        <h1>das ist ein test</h1>
    @endsection


</main>
<!-- Scripts -->
<script src="/js/app.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
{{--Footer Navbar--}}
<footer>
    <div class="footer">
        <nav class="navbar navbar-default" style="margin-bottom: 0;">
            <div class="container-fluid bg-success">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-collapse" onmouseover="hoverselectednavbar()">
                        <ul class="nav navbar-nav">
                            <li class="first foot" name="Datenschutz"><a style= "text-decoration: none" href="{{ url('/datenschutz') }}">Datenschutz</a></li>
                            <li name="Impressum"><a style= "text-decoration: none" href="{{ url('/impressum') }}">Impressum</a></li>
                            <li name="Kontakt"><a style= "text-decoration: none" href="{{ url('/contact') }}">Kontakt</a></li>
                        </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li role="presentation" name="Facebook" style="list-style: none">
                    <div class="fb-like" data-href="https://www.facebook.com/Tutorpia" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false" style="padding-right: 10em; padding-top: 1em; padding-left:1em"></div>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</footer>

{{--Cookiehinweis --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#c9e2b3",
                    "text": "#777777"
                },
                "button": {
                    "background": "#f5f8fa",
                    "text": "#777"
                }
            },
            "content": {
                "message": "Diese Webseite benötigt Cookies. Bitte akzeptieren unsere Cookiebestimmungen.",
                "dismiss": "akzeptieren",
                "link": "mehr Infos",
                "href": "/datenschutz"
            }
        })});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/minjs/layout.min.js') }}"></script>
</body>
</html>