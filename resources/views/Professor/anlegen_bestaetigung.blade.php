@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">



    <div class="panel panel-success">
        <div class="panel-heading">{{$request->aufgabenname}}</div>
        <div class="panel-body">
            <div class="bg-warning"> <p>Sie wollen die folgende Aufgabe anlegen: {{$request->aufgabenname}}</p>
                <p>Beachten Sie die Aufgabe ist für alle Benutzer des Kurses sofort einsehbar ist. Bitte überprüfen Sie Ihre Angaben auf
                    Richtigkeit und korrigieren gegebenfalls diese.<p>
            </div>
            <form class="form-horizontal" action="{{url ('Professor')}}" method="post">
                {{ csrf_field() }}

                <div class="form group">
                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                    <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname" onkeypress="buttonFaerben(this)"
                          value="{{$request->aufgabenname}}" maxlength="50" required>
                </div>

                <div class="form group">
                    <label for="date" class="control-label">Abgabedatum</label>
                    <input type="text" class="form-control" name="abgabedatum" id="Datum" value="{{$request->abgabedatum}}" maxlength="50" onkeypress="buttonFaerben(this)" required>
                </div>

                <div class="form group">
                    <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                    <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung"  required rows="5" maxlength="255" onkeypress="buttonFaerben(this)">{{$request->aufgabenbeschreibung}}</textarea>
                </div>

                <div class="form-group formgroup right">
                    <button type="button" class="btn btn-danger speichern" onclick="window.location='{{ url("reset") }}'">abbrechen</button>
                    <input type="submit" class="btn btn-success speichern"  style=" margin-right: 10em" value="anlegen"></div>

            </form>
        </div>
    </div>




</div>
    </div>

@endsection