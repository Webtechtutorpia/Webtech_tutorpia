@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/Aufgaben.js') }}"></script>

    <div class="container" id="container">
        <div class="row" >

            <h2>Studentenmodus: DBIS</h2>

            <div class="col-md-4 col-md-offset-8">


                <form class="form-inline" method="get">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?php Session::token()?>">
                        <input type="text" name ="search_abgabe" value="{{$cityName or ''}}"id="search_abgabe" onkeyup="ajaxSearch(this.value)" class="form-control" placeholder="Suche nach..."
                        autofocus onfocus="this.value=this.value;" autocomplete="off">

                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</form>

</div>
            <div id="liste"></div>






            {{--je nach Datenbankeintrag Element anzeigen--}}
            <h3>Alle Aufgaben:</h3>
            @foreach($myinputs as $key => $value)

                                @if( $value->zustand == '.')
                                    <div class="col-md-12 col-xs-12">
                                    <div class="panel panel-info aufgabe ">
                                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                            <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                                        </div>

                                        <div class="panel-body notVisible">

                                            <div class="fileUpload notVisible">
                                            <form class="form-horizontal" role="form" method="POST"
                                                  action="{{ url('FileUpload') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}


                                                <div class="form group">
                                                    <input type="hidden" name="aufgabenname" value="{{$value->aufgabenname}}">
                                                    <input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">
                                                    <input type="hidden" name="username" value="{{$value->name}}">
                                                    <input type="file" class="form-control" name="upload" id="upload" onkeypress="buttonFaerben(this)">
                                                </div>


                                                <div class="form-group" style="margin-top: 2em;">
                                                    <button type="submit" class="btn btn-primary speichern" value="Abschicken"
                                                            style="float: right">
                                                        Datei hochladen
                                                    </button>

                                                </div>
                                            </form>
                                        </div>


                                        <div class="austauschen">
                                            @if (Session::has('message'))
                                                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                            @endif
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                                <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                                            </div>
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                                                <div class="col-md-3  col-xs-6 size"> {{$value->abgabedatum}}</div>
                                                <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                                                <div class="col-md-3  col-xs-4 size">
                                                    <a class="btn btn-primary btn" onclick="add(this)" role="button">Upload</a>

                                                </div>
                                            </div>
                                            <div class="panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                                                <div class="col-md-3 col-xs-2 size"><span><a href="mailto:{{$value->email}}?subject=Frage zur Abnahme von {{$value->aufgabenname}} bei {{$value->name}}"
                                                                                             class="glyphicon glyphicon-envelope"></a></span>
                                                </div>
                                                <div class="col-md-3 col-xs-12"> Status:</div>
                                                <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                        @endif
                                @if($value->zustand == '-')
                                <div class="col-md-12 col-xs-12">
                                    <div class="panel panel-danger aufgabe ">
                                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                            <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div></div>
                                        <div class="panel-body notVisible">
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                                <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                                            </div>
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3  col-xs-6 size">Abgabe bis:</div>
                                                <div class="col-md-3  col-xs-6 size">{{$value->abgabedatum}} </div>
                                                <div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>
                                                <div class="col-md-3 col-xs-6 size">{{$value->abgabedatum}}</div>
                                            </div>
                                            <div class="panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                                <div class="col-md-3 col-xs-2 size"><span><a href="mailto:{{$value->email}}?subject=Fehler bei Abnahme von {{$value->aufgabenname}} bei {{$value->name}}"
                                                                                             class="glyphicon glyphicon-envelope"></a></span>
                                                </div>
                                                <div class="col-md-3 col-xs-12"> Status:</div>
                                                <div class="col-md-3 col-xs-12 size"> Abgabe nicht erfolgreich</div>
                                            </div>
                                            <div class="panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3  col-xs-6 size">Kommentar: </div>

                                                <div class="col-md-3 col-xs-2 size">Abgabezeitpunkt verstrichen
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($value->zustand == '+')
                                <div class="col-md-12 col-xs-12 ">

                                <div class="panel panel-success aufgabe ">
                                <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                                </div>
                                <div class="panel-body notVisible">
                                <div class=" panel-group" style="padding-bottom: 1%">
                                <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                <div class="col-md-9 col-xs-12 size">{{$value->aufgabenname}}</div>
                                </div>

                                <div class="panel group" style="padding-bottom: 1%">
                                <div class="col-md-3 col-xs-6 size ">Upload am:</div>
                                <div class="col-md-3 col-xs-6 size ">{{$value->created_at}}</div>
                                <div class="col-md-3 col-xs-6 size"> korregiert am:</div>
                                <div class="col-md-3  col-xs-6 size"> {{$value->updated_at}}</div>
                                </div>

                                <div class="panel-group" style="padding-bottom: 1%;">
                                <div class="col-md-3 col-xs-6 size">Abnahme durch:</div>
                                <div class="col-md-3 col-xs-6 size"> Tutor1</div>

                                <div class="col-md-3 col-xs-6 size"> korregierte Version:</div>
                                <div class="col-md-3 col-xs-4 size">
                                <button class="btn-primary btn " style="padding: 0px 12px;" type="button">Download
                                </button>
                                </div>
                                </div>
                                <div class="panel-group " style=";">
                                <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                    <div class="col-md-3 col-xs-2 size"><span><a href="mailto:{{$value->email}}?subject=Frage zur Abnahme von {{$value->aufgabenname}} bei {{$value->name}}"
                                                                                 class="glyphicon glyphicon-envelope"></a></span>
                                    </div>
                                </div>
                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-12"> Status:</div>
                                    <div class="col-md-3 col-xs-12 size">erfolgreich abgegeben</div>

                                </div>
                                </div>
                                </div>
                                </div>
                                    @endif

                            @if($value->zustand == '/')
                                <div class="col-md-12 col-xs-12 ">

                                    <div class="panel panel-warning aufgabe ">
                                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                            <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                                        </div>
                                        <div class="panel-body notVisible">
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                                <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                                            </div>
                                            <div class=" panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3  col-xs-6 size">Upload am :</div>
                                                <div class="col-md-3  col-xs-6 size"> {{$value->updated_at}}</div>
                                                <div class="col-md-3  col-xs-6 size">Datei löschen:</div>
                                                <div class="col-md-3  col-xs-4 size">
                                                    <form action="{{ url('Aufgabenansicht') }}/{{$value->abgabeid }}"  onsubmit="return confirm('Sind Sie sicher, dass Sie die Datei von {{ $value->abgabeid}} wirklich löschen wollen?')" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn-primary btn"style="padding: 0px 12px;" type="submit">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel-group" style="padding-bottom: 1%;">
                                                <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                                <div class="col-md-3 col-xs-2 size"><span><a href="mailto:{{$value->email}}?subject=Frage zur {{$value->aufgabenname}} von {{$value->name}}"
                                                                                             class="glyphicon glyphicon-envelope"></a></span>
                                                </div>
                                                <div class="col-md-3 col-xs-12"> Status:</div>
                                                <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endif



            @endforeach


    </div>
    </div>



@endsection
