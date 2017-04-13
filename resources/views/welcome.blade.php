
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tutorpia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">


    </head>
    <body>
    <header>

        <nav>
            <ul class="nav nav-tabs">
                @if (Auth::check())
                    <li role="presentation" class="active"><a href="#">Übersicht</a></li>
                    <li role="presentation"><a href="#">Kurse</a></li>
                    <li role="presentation"><a href="#">Abgaben</a></li>

                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation" class="bottom-right"><a href="{{ url('/login') }}">Login</a></li>
                        <li role="presentation" class="right"><a href="{{ url('/register') }}">Registrierung</a></li>
                    </ul>
            </ul>
            @endif
        </nav>

    </header>

    <div class="row">
        <div class="col-xs-6 col-md-6 bild">
            <a href="#" class="thumbnail">
                <img src="http://placehold.it/500x300">
            </a>
        </div>
    </div>
        <footer>
            <div>
                <ul id="navlist">
                    <li class="first">Datenschutz</li>
                    <li>Impressum</li>
                    <li>Kontakt</li>
                    <li>Hilfe</li>

                </ul>
            </div>
        </footer>
    </body>
</html>
