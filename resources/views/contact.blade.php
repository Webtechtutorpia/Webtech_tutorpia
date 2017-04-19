@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
    <form action="/overview">

        @if ( $errors->count() > 0 )
            <div class="col-sm-offset-2 col-sm-10">
                <div class="alert alert-danger" role="alert">
                    <p>Leider sind folgende Fehler aufgetreten:</p>
                    <ul>
                        @foreach( $errors->all() as $message )
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
            @if (Session::get('sendsuccess'))
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="alert alert-success" role="alert">Wir haben Ihre Nachricht erhalten. Vielen Dank dafür!</div>
                </div>
            @endif

        <label for="fname">Vorname</label>
        <input type="text" id="fname" name="firstname" placeholder="Bitte Vorname eintragen..">

        <label for="lname">Nachname</label>
        <input type="text" id="lname" name="lastname" placeholder="Bitte Nachname eintragen..">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Bitte Email eintragen...">

        <label for="subject">Nachricht</label>
        <textarea id="subject" name="subject" placeholder="Bitte Nachricht eintragen" style="height:200px"></textarea>

        <input class="btn-primary" type="submit" value="Bestätigen">

            </form>
</div>

@endsection