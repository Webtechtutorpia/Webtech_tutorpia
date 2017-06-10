@extends('layouts.app')
<style> .blue {
        color: blue;
    }</style>
@section('content')
    @if (Auth::user()->rolle=="Professor" || Auth::user()->rolle=="Tutor" )
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/professorenmodus.js') }}"></script>

        <div class="container">
            <div class="row">
                <h2>Korrekturmodus: {{$kurs}}</h2>

                {{--<div class="col-md-12 col-xs-12 ">--}}
                    {{--<h4> Kurs: bla</h4>--}}


                    {{--@if($zustand== "+")--}}
                        {{--<b>--}}
                            {{--<div class="glyphicon glyphicon-plus"></div>--}}
                        {{--</b>--}}
                        {{--<div class="panel panel-success aufgabe ">--}}
                            {{--@elseif($zustand=="-")--}}
                                {{--<b>--}}
                                    {{--<div class="glyphicon glyphicon-minus"></div>--}}
                                {{--</b>--}}
                                {{--<div class="panel panel-danger aufgabe">--}}
                                    {{--@else--}}
                                        {{--<b>unknown</b>--}}
                                        {{--<div class="panel panel-warning aufgabe ">--}}
                                            {{--@endif--}}
                                            {{--<div class="panel-heading" onclick="Bodyhandler(this) ">--}}
                                                {{--<div style="display:inline">{{$aufgabenname }}</div>--}}
                                                {{--<div style="float:right ">Student: {{$student}}</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-body ">--}}
                                                {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                                                    {{--<div class="col-md-3 col-xs-6 size"> Abgabedatum:</div>--}}
                                                    {{--<div class="col-md-9 col-xs-12 size"> 28.05.2017 12:51</div>--}}
                                                {{--</div>--}}
                                                {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                                                    {{--<h4 class="col-md-12 col-xs-12 text-center">Studentenversion</h4>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size">Upload am :</div>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size">--}}
                                                        {{--<button class="btn btn-default btn-primary">Download</button>--}}
                                                    {{--</div>--}}
                                                    {{--bessere Namen....--}}
                                                    {{--<h4 class="col-md-12 col-xs-12 Text-center">Tutorenberech </h4>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size">Korrigiert am :</div>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>--}}
                                                    {{--<div class="col-md-6  col-xs-6 size">Abnahme durch: Tutor1</div>--}}

                                                    {{--<div class="col-md-6 col-xs-6 size"> Datei: (Pfad)</div>--}}
                                                    {{--<div class="col-md-3  col-xs-6 size btn-group">--}}
                                                        {{--<button class="btn btn-default btn-primary">Download</button>--}}
                                                        {{--<button class="btn btn-default btn-primary">Delete</button>--}}
                                                    {{--</div>--}}

                                                    {{--</div>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="Aufgabenname"--}}
                                                               {{--class="control-label col-md-12 col-xs-12"--}}
                                                               {{--style="text-decoration: none">Kommentar:</label>--}}
                                                        {{--<div class="input-group col-md-12 col-xs-12">--}}
                                                        {{--<input type="text" class="form-control" name="aufgabenname"--}}
                                                               {{--id="Aufgabenname" onkeypress="buttonFaerben(this)"--}}
                                                               {{--placeholder="Hier Kommentar eintragen">--}}
                                                            {{--<div class="input-group-btn">--}}
                                                                {{--<button class="btn btn-default btn-primary">setzen</button>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                            {{--<div class="col-md-3 col-xs-6 size">Status </div>--}}
                                                        {{--<div class="dropdown">--}}

                                                            {{--<div class="btn-group" role="group">--}}
                                                                {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                    {{--Dropdown--}}
                                                                    {{--<span class="caret"></span>--}}
                                                                {{--</button>--}}
                                                                {{--<ul class="dropdown-menu">--}}
                                                                    {{--<li><a href="#">abnehmen</a></li>--}}
                                                                    {{--<li><a href="#">ablehnen</a></li>--}}
                                                                    {{--<li><a href="#">unbearbeitet</a></li>--}}
                                                                {{--</ul>--}}
                                                                {{--<button class="btn btn-default">Status ändern</button>--}}
                                                            {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="input-group">--}}



                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
    {{--@endif--}}
                    @foreach($myinputs as $key => $value)
                                @if( $value->zustand == '.')
                                    <div class="col-md-12 col-xs-12">
                                        <div class="panel panel-info aufgabe ">
                                            <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                                <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                                            </div>
                                            @endif
                                            @if( $value->zustand == '/')
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="panel panel-warning aufgabe ">
                                                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                                            <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                                                        </div>
                                                        @endif
                                                        @if( $value->zustand == '+')
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="panel panel-success aufgabe ">
                                                                    <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                                                        <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                                                                    </div>
                                                                    @endif
                                                                    @if( $value->zustand == '-')
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="panel panel-danger aufgabe ">
                                                                                <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                                                                    <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div>
                                                                                </div>
                                                                                @endif

                                            <div class="panel-body">

                                                {{--<div class="fileUpload notVisible">--}}
                                                    {{--<form class="form-horizontal" role="form" method="POST"--}}
                                                          {{--action="{{ url('FileUpload') }}" enctype="multipart/form-data">--}}
                                                        {{--{{ csrf_field() }}--}}


                                                        {{--<div class="form group">--}}
                                                            {{--<input type="hidden" name="aufgabenname" value="{{$value->aufgabenname}}">--}}
                                                            {{--<input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">--}}
                                                            {{--<input type="hidden" name="username" value="{{$value->name}}">--}}
                                                            {{--<input type="file" class="form-control" name="upload" id="upload" onkeypress="buttonFaerben(this)">--}}
                                                        {{--</div>--}}


                                                        {{--<div class="form-group" style="margin-top: 2em;">--}}
                                                            {{--<button type="submit" class="btn btn-primary speichern" value="Abschicken"--}}
                                                                    {{--style="float: right">--}}
                                                                {{--Datei hochladen--}}
                                                            {{--</button>--}}

                                                        {{--</div>--}}
                                                    {{--</form>--}}
                                                {{--</div>--}}


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
                                                    <td>{{$value->aufgabenname}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Abgabedatum:</td>
                                                    <td>{{$value->abgabedatum}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Upload am:</td>
                                                    <td>{{$value->updated_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Datei:</td>
                                                    <td><button class="btn btn-default btn-primary" onclick="window.location.href='/download?kurs={{$kurs}}&id={{$value->abgabeid}}'">Download</button></td>
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
                                                        {{--<div class="btn-group" role="group">--}}
                                                        {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                        {{--Auswahl--}}
                                                        {{--<span class="caret"></span>--}}
                                                        {{--</button>--}}
                                                        {{--<ul class="dropdown-menu">--}}
                                                        {{--<li><a href="#">abnehmen</a></li>--}}
                                                        {{--<li><a href="#">ablehnen</a></li>--}}
                                                        {{--<li><a href="#">unbearbeitet</a></li>--}}
                                                        {{--</ul>--}}
                                                        {{--</div>--}}
                                                        <select required name="bewertung">
                                                            <option value="">Bitte auswählen:</option>
                                                            <option value="abnehmen">abnehmen</option>
                                                            <option value="ablehnen">ablehnen</option>

                                                        </select>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td>Bewertung abschicken:</td>
                                                        <td><button class="btn btn-primary">bewerten</button></td>
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
@endif
@endsection