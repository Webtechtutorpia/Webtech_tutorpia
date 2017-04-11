<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tutorpia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;

            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body {
                font-family: sans-serif;
                color: #333333;
                padding: 8em 0 3em;
            }

            body,
            .wrapper {
                margin: 10px auto;
                max-width: 60em;
            }
            footer {
                position: fixed;
                padding: 10px;
                bottom: 0;
                left: 0;
                right: 0;
                background: #c32e04;
                border-color: #8a9da8;
            }
            footer p {
                float: right;
                margin: 0;
            }

            #navlist li {
                display: inline;
                list-style-type: none;
                padding-right: 20px;
            }
            header {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                text-align: center;
                padding: 10px;
                background: #F1F3F4;
                border-bottom: 1px solid #d5d5d5;
            }
            header img {
                width: 13em;
                margin-right: 50px;
                float: left;
            }


        </style>
    </head>
    <body>
    <header>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
        @endif
        </div>
    </header>
    <div class="flex-center position-ref full-height">
        <div class="content">
                <div class="title m-b-md">
                    Tutorpia
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
        </div>
    </div>
        <footer>
            <div class="r4">
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
