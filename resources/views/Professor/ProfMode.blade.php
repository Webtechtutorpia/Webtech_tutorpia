@extends('layouts.app')
@section('content')
    {{--@if (Auth::user()->rolle=="Professor")--}}


    <div class="container">
        <div class="row">

            <div class="">
                <h3 class="col-md-5" id="test"> Professorenmodus: {{session()->get('global_variable')}}</h3>
            </div>

            <span class="glyphicon glyphicon-plus col-md-offset-12" id="bigsize-right" id="plus"
                  onclick="add(this)"></span>


            <div class="col-md-11 neueAufgabe nonedisplay">
                <div class="panel panel-success ">
                    <div class="panel-heading" onclick="panel_behavior(this)">

                        <b>neue Aufgabe</b>
                        <div class="pull-right">

                            <i onclick="verstecken(this)" class="middlesize-right glyphicon glyphicon-trash"></i>


                        </div>


                    </div>
                    <div class="panel-body notVisible">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">

                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST"
                              {{--action="{{ url('Professor') }}" >--}}
                              action="{{ url('confirm')}}">

                            {{ csrf_field() }}

                            <div class="form group">
                                <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"
                                       onkeypress="buttonFaerben(this)"
                                       placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="date" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" name="abgabedatum" id="Datum"
                                       placeholder="01.01.2017 20:59" onkeypress="buttonFaerben(this)">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                          onkeypress="buttonFaerben(this)"
                                          placeholder="Hier Aufgabenstellung eintragen"></textarea>
                            </div>

                            <div class="form-group formgroup">
                                <button type="submit" class="btn btn-primary speichern right" disabled value="Abschicken"
                                        >
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
                        <div class="panel-heading" onclick="panel_behavior(this)">

                            <b>{{$value->aufgabenname}}</b>
                            <div class="pull-right">
                                <form action="{{ url('Professor') }}/{{$value->id }}"
                                      onsubmit="return confirm('Sind Sie sicher, dass Sie {{ $value->aufgabenname}} wirklich löschen wollen?')"
                                      method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit">
                                        <i class="middlesize-right glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                            </div>


                        </div>
                        <div class="panel-body notVisible">
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
                                  action="{{ url('Professor') }}/{{$value->id }}"
                                  onsubmit="return confirm('Sind Sie sicher, dass Sie {{ $value->aufgabenname}} ändern wollen?')">
                                {{ csrf_field() }}
                                {{ method_field('PATCH')}}
                                <div class="form group">

                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"
                                           value="{{$value->aufgabenname}}" onkeypress="buttonFaerben(this)"
                                           placeholder="Hier Aufgabenname eintragen">
                                </div>

                                <div class="form group">
                                    <label for="date" class="control-label">Abgabedatum</label>
                                    <input type="text" class="form-control" name="abgabedatum" id="Datum"
                                           placeholder="01.01.2017 29:59" value="{{$value->abgabedatum}}"
                                           onkeypress="buttonFaerben(this)">
                                </div>

                                <div class="form group">
                                    <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                    <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                              placeholder="Hier Aufgabenstellung eintragen"
                                              onkeypress="buttonFaerben(this)">{{$value->aufgabenbeschreibung}}</textarea>
                                </div>

                                <div class="form-group formgroup">
                                    <button type="submit" class="btn btn-primary speichern right" value="Abschicken" disabled
                                          >
                                        Speichern

                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/minjs/professorenmodus.min.js') }}"></script>
@endsection