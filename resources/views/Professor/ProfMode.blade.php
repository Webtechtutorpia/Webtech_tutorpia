@extends('layouts.app')
<style> .blue{
        color:blue;
    }</style>
@section('content')
    @if (Auth::user()->rolle=="Professor")
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script> $( document ).ready(function() {
                $("li[name='Profmodus']").css('background-color', '#f5f8fa');
            });</script>
        <script type="text/javascript" src="{{ URL::asset('js/professorenmodus.js') }}"></script>

        <div class="container">
            <div class="row">

                <div class="">
                    <h3 class="col-md-5" id="test"> Professorenmodus: ALDA</h3>
                </div>

                <span class="glyphicon glyphicon-plus col-md-offset-12" id="bigsize-right" id="plus" onclick="add(this)"></span>


            <div class="col-md-11 neueAufgabe" style="display:none">
                <div class="panel panel-default ">
                    <div class="panel-heading" onclick="Bodyhandler(this)">

                        <b>neue Aufgabe</b>
                        <div class="pull-right">
                                <button type="submit" onclick="verstecken(this)">
                                    <i class="middlesize-right glyphicon glyphicon-trash"></i>
                                </button>


                        </div>


                    </div>
                    <div class="panel-body" style="display:none">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('Professor') }}" >
                            {{ csrf_field() }}

                            <div class="form group">

                                <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"
                                       placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="date" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59" >
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                          placeholder="Hier Aufgabenstellung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Hinzufügen

                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                {{--je nach Datenbankeintrag Element anzeigen--}}
                @foreach($myinputs as $key => $value)
                    <div class="col-md-11">
                        <div class="panel panel-default ">
                            <div class="panel-heading" onclick="Bodyhandler(this)">

                                <b>{{$value->aufgabenname}}</b>
                                <div class="pull-right">
                                    <form action="./Professor/{{$value->id }}"  onsubmit="return confirm('Sind Sie sicher, dass Sie {{ $value->aufgabenname}} wirklich löschen wollen?')" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">
                                            <i class="middlesize-right glyphicon glyphicon-trash"></i>
                                        </button>
                                    </form>
                                </div>


                            </div>
                            <div class="panel-body" style="display:none">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('Professor') }}/{{$value->id }}" onsubmit="return confirm('Sind Sie sicher, dass Sie {{ $value->aufgabenname}} ändern wollen?')">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH')}}
                                    <div class="form group">

                                        <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                        <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"  value="{{$value->aufgabenname}}"
                                               placeholder="Hier Aufgabenname eintragen">
                                    </div>

                                    <div class="form group">
                                        <label for="date" class="control-label">Abgabedatum</label>
                                        <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59" value="{{$value->abgabedatum}}">
                                    </div>

                                    <div class="form group">
                                        <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                        <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                                  placeholder="Hier Aufgabenstellung eintragen">{{$value->aufgabenbeschreibung}}</textarea>
                                    </div>

                                    <div class="form-group" style="margin-top: 2em;">
                                        <button type="submit" class="btn btn-primary" value="Abschicken"
                                                style="float: right">
                                            Bearbeiten

                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    @endif

@endsection