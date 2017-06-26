@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                {{--//{{ URL('contact_confirmation') }}--}}
                <form action="contactconfirmation" method="post">

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
                            <div class="alert alert-success" role="alert">Wir haben Ihre Nachricht erhalten. Vielen Dank
                                dafür!
                            </div>
                        </div>
                    @endif<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="name" placeholder="Bitte Vorname eintragen.." maxlength="100">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" maxlength="100" placeholder="Bitte Email eintragen...">

                    <label for="lname">Betreff</label>
                    <input type="text" id="lname" name="subject" placeholder="Bitte Nachname eintragen.." maxlength="255">

                    <label for="subject">Nachricht</label>
                    <textarea id="subject" name="message" placeholder="Bitte Nachricht eintragen"
                              style="height:200px" maxlength="255"></textarea>

                    <input type="submit" class=" btn-primary btn" value="Bestätigen">

                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $(document).ready(function(){$("li[name='Kontakt']").css("background-color","#f5f8fa")});</script>
@endsection