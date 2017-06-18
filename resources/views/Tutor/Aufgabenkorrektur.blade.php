@extends('layouts.app')
@section('content')
    {{--@if (Auth::user()->rolle=="Professor" || Auth::user()->rolle=="Tutor" )--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/professorenmodus.js') }}"></script>

        <div class="container">
            <div class="row">
                <h2>Korrekturmodus: {{$kurs}}</h2>

                    @foreach($myinputs as $key => $value)
                                {{--@if( $value->zustand == '.')--}}
                                    {{--<div class="col-md-12 col-xs-12">--}}
                                        {{--<div class="panel panel-info aufgabe ">--}}
                                            {{--<div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}--}}
                                                {{--<div  class="glyphicon glyphicon-minus right inlinedisplay"></div>--}}
                                            {{--</div>--}}
                                            {{--@endif--}}
                                            @if( $value->zustand == '/')
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="panel panel-warning aufgabe ">
                                                        <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                                                            <div class="glyphicon glyphicon-minus icon-right"></div>
                                                        </div>
                                                        @endif
                                                        @if( $value->zustand == '+')
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="panel panel-success aufgabe ">
                                                                    <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                                                                        <div  class="glyphicon glyphicon-ok icon-right"></div>
                                                                    </div>
                                                                    @endif
                                                                    @if( $value->zustand == '-')
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="panel panel-danger aufgabe ">
                                                                                <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                                                                                    <div class="glyphicon glyphicon-remove icon-right"></div>
                                                                                </div>
                                                                                @endif

                                            <div class="panel-body">



                                                <div class="austauschen">
                                                    @if (Session::has('message'))
                                                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                                    @endif

                                            <table class = "table responsive">
                                                <tr>
                                                    <th>Studentenversion</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>Student:</td>
                                                    <td>{{$value->name}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Aufgabenstellung:</td>
                                                    <td>{{$value->aufgabenbeschreibung}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Abgabedatum:</td>
                                                    <td>{{$value->abgabedatum}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Upload am:</td>
                                                    <td>{{$value->upload_am}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Datei:</td>
                                                    <td>
                                                    <form action="/download" method="post">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                        <input type="hidden" name="kurs" value="{{$kurs}}">
                                                        <input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">
                                                        <button type="submit" class="btn-primary btn">Download</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Student kontaktieren</td>
                                                    <td><span><a href="mailto:{{$value->email}}?subject=Frage zur Abnahme von {{$value->aufgabenname}}"
                                                                 class="glyphicon glyphicon-envelope"></a></span></td>
                                                </tr>

                                                <tr>
                                                    <th>Bewertungsbereich</th>
                                                    <th></th>
                                                </tr>
                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">

                                                            @foreach ($errors->all() as $error)
                                                                <p>{{ $error }}</p>
                                                            @endforeach

                                                    </div>
                                                @endif
                                                <form class="form-horizontal" role="form" method="POST"
                                                      action="{{ url('Tutor/Aufgabenkorrektur') }}">
                                                    {{ csrf_field() }}
                                                <tr>
                                                    <td>Kommentar:</td>
                                                    <td>
                                                    <input required type="text" class="form-control" name="kommentar"
                                                    id="kommentar" onkeypress="buttonFaerben(this)"
                                                    placeholder="Hier Kommentar eintragen">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status:</td>
                                                    <td>

                                                        <select required name="bewertung" onchange="buttonFaerben(this)">
                                                            <option value="">Bitte auswählen:</option>
                                                            <option value="abnehmen">abnehmen</option>
                                                            <option value="ablehnen">ablehnen</option>

                                                        </select>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td>Bewertung abschicken:</td>
                                                        <td><button class="btn btn-primary speichern" disabled>bewerten</button></td>
                                                    </tr>
                                            </form>
                                            </table>
                                                </div>
                                                </div>
                                        </div>
                                        </div>


                    {{--@endif--}}

    @endforeach
            </div>
        </div>
{{--@endif--}}
@endsection