@extends('layouts.app')


@section('content')
    @if (Auth::user()->rolle=="Professor")

        <script type="text/javascript" src="{{ URL::asset('js/professorenmodus.js') }}"></script>

        <div class="container">
            <div class="row">
                <div class="">
                    <h3 class="col-md-5" id="test"> Professorenmodus: ALDA!</h3>
                </div>

                <span class="glyphicon glyphicon-plus col-md-offset-12 " id="bigsize-right" onclick="plus()"
                      onemouseover=""></span>


                <div class="col-md-11">

                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 7 </b>
                            <a href style="display: inline" id="middlesize-right" class="glyphicon glyphicon-trash"></a>
                            <a href style="display: inline" id="middlesize-right" class="glyphicon glyphicon-cog"></a>
                        </div>
                        <div class="panel-body">
                            <div class="form group">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/professorenmodus') }}">
                                    {{ csrf_field() }}
                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenstellung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 2 </b>
                            <a href style="display: inline" id="middlesize-right"
                               class="glyphicon glyphicon-trash"></a>
                            <a href style="display: inline" id="middlesize-right"
                               class="glyphicon glyphicon-cog"></a>
                        </div>
                        <div class="panel-body">
                            <div class="form group">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/professorenmodus') }}">
                                    {{ csrf_field() }}
                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenstellung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 3 </b>
                            <a href style="display: inline" id="middlesize-right"
                               class="glyphicon glyphicon-trash"></a>
                            <a href="display: inline" id="middlesize-right" class="glyphicon glyphicon-cog"></a>
                        </div>
                        <div class="panel-body">
                            <div class="form group">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/professorenmodus') }}">
                                    {{ csrf_field() }}
                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenstellung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>
                                </form>
                            </div>

                        </div>

                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 4 </b>
                            <a href style="display: inline" id="middlesize-right"
                               class="glyphicon glyphicon-trash"></a>
                            <a href style="display: inline" id="middlesize-right"
                               class="glyphicon glyphicon-cog"></a>
                        </div>
                        <div class="panel-body">
                            <div class="form group">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/professorenmodus') }}">
                                    {{ csrf_field() }}
                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenstellung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>
                                </form>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
        </div>
        </div>
    @endif

@endsection
