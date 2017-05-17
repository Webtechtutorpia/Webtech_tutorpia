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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('js/layout.js') }}"></script>
    <title>{{ config('app.name', 'Tutorpia') }}</title>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
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
                        {{ config('app.name', 'Tutorpia') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" onmouseover="hoverselectednavbar()">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())

                        <ul class="nav navbar-nav">
                            <li role="presentation" name="Übersicht"><a href="/Activity">Übersicht</a></li>
                            <li role="presentation" name="Kurse"><a href="/Kurse">Kurse</a></li>
                            <li role="presentation" name="Abgaben"><a href="/abgabe">Abgaben</a></li>
                            @if (Auth::user()->rolle=="Professor")
                                <li role="presentation"name="Profmodus"><a href="/Professor">Professorenmodus</a></li>
                            @else
                                <li role="presentation" name="Aufgaben"><a href="/Tutor">Aufgaben</a></li>
                            @endif
                        </ul>

                @endif
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
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
<footer class="bg-success">

    <div class="collapse navbar-collapse" id="app-navbar-collapse" onmouseover="hoverselectednavbar()">
        <ul id="navlist" class="navbar navbar-nav">
            <li class="first foot" name="Datenschutz"><a href="{{ url('/datenschutz') }}">Datenschutz</a></li>
            <li name="Impressum"><a href="{{ url('/impressum') }}">Impressum</a></li>
            <li name="Kontakt"><a href="{{ url('/contact') }}">Kontakt</a></li>
            <li> <div class="fb-follow" data-href="https://www.facebook.com/zuck" data-layout="standard" data-size="large" data-show-faces="false" style="float:right"></div></li>
        </ul>
        <ul class="navbar navbar-right">
            <li class="col-md-offset-7" name="Facebook" style="list-style: none">
                {{--<button type="button" class="btn btn-group-sm btn-primary" aria-label="Links ausrichten">--}}
                {{--<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>--}}
                {{--</button>--}}
                {{--like uns auf Facebook--}}

                {{--<div class="fb-follow" data-href="https://www.facebook.com/zuck" data-layout="standard" data-size="large" data-show-faces="true"></div>--}}
            </li>
        </ul>
    </div>

</footer>
</body>
</html>