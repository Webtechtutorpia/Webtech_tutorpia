@extends('layouts.app')

@section('content')
    <h3> gesuchte Aufgaben: </h3>
    @foreach ($abgaben as $value)
        @if( $value->zustand == '.')
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-info aufgabe ">
                    <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                        <div class="glyphicon glyphicon-minus icon-right"></div>
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
                                    <input type="file" class="form-control" name="upload" id="upload"
                                           onkeypress="buttonFaerben(this)">
                                </div>


                                <div class="form-group uploadbutton">
                                    <button type="submit" class="btn btn-primary speichern right" value="Abschicken">
                                        Datei hochladen
                                    </button>

                                </div>
                            </form>
                        </div>


                        <div class="austauschen">
                            @if (Session::has('message'))
                                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                            @endif
                            <div class=" panel-group panelabstand">
                                <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                            </div>
                            <div class=" panel-group panelabstand" >
                                <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                                <div class="col-md-3  col-xs-6 size"> {{$value->abgabedatum}}</div>
                                <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                                <div class="col-md-3  col-xs-4 size">
                                    <a class="btn btn-primary btn" onclick="add(this)" role="button">Upload</a>

                                </div>
                            </div>
                            <div class="panel-group panelabstand">
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
                    <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                        <div class="glyphicon glyphicon-remove icon-right"></div>
                    </div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group panelabstand" >
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                        </div>
                        <div class=" panel-group panelabstand" >
                            <div class="col-md-3  col-xs-6 size">Abgabe bis:</div>
                            <div class="col-md-3  col-xs-6 size">{{$value->abgabedatum}} </div>
                            <div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>
                            <div class="col-md-3 col-xs-6 size">{{$value->korrigiert_am}}</div>
                            <div class="col-md-3 col-xs-6 size">Abgelehnt durch:</div>
                            <div class="col-md-3 col-xs-6 size">{{$value->bearbeitet_von}}</div>
                            <div class="col-md-3 col-xs-6 size">Datei:</div>
                            <div class="col-md-3 col-xs-6 size">
                                <form action="/download" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="kurs" value="{{$kurs}}">
                                    <input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">
                                    <button type="submit" class="btn-primary btn">Download</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel-group panelabstand" >
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a
                                            href="mailto:{{$value->tutoremail}}?subject=Fehler bei Abnahme von {{$value->aufgabenname}} bei {{$value->name}}"
                                            class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                        </div>
                        <div class="panel-group panelabstand" >
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size">abgelehnt</div>

                        </div>
                        <div class="panel-group ">
                            <div class="col-md-3 col-xs-6 size"> Kommentar:</div>
                            <div class="col-md-3 col-xs-2 size">{{$value->kommentar}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($value->zustand == '+')
            <div class="col-md-12 col-xs-12 ">

                <div class="panel panel-success aufgabe ">
                    <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                        <div  class="glyphicon glyphicon-ok icon-right"></div>
                    </div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group panelabstand">
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size">{{$value->aufgabenname}}</div>
                        </div>

                        <div class="panel group panelabstand">
                            <div class="col-md-3 col-xs-6 size ">Upload am:</div>
                            <div class="col-md-3 col-xs-6 size ">{{ $value->upload_am}}</div>
                            <div class="col-md-3 col-xs-6 size"> korregiert am:</div>
                            <div class="col-md-3  col-xs-6 size"> {{$value->korrigiert_am}}</div>
                        </div>

                        <div class="panel-group panelabstand">
                            <div class="col-md-3 col-xs-6 size">Abnahme durch:</div>
                            <div class="col-md-3 col-xs-6 size"> {{$value->bearbeitet_von}}</div>

                            <div class="col-md-3 col-xs-6 size"> Datei:</div>
                            <div class="col-md-3 col-xs-4 size">
                                <form action="/download" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="kurs" value="{{$kurs}}">
                                    <input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">
                                    <button type="submit" class="btn-primary btn">Download</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel-group ">
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a
                                            href="mailto:{{$value->tutoremail}}?subject=Frage zur Abnahme von {{$value->aufgabenname}} bei {{$value->name}}"
                                            class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                        </div>
                        <div class="panel-group panelabstand">
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size">erfolgreich abgegeben</div>

                        </div>
                        <div class="panel-group ">
                            <div class="col-md-3 col-xs-6 size"> Kommentar:</div>
                            <div class="col-md-3 col-xs-2 size">{{$value->kommentar}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value->zustand == '/')
            <div class="col-md-12 col-xs-12 ">

                <div class="panel panel-warning aufgabe ">
                    <div class="panel-heading" onclick="panel_behavior(this)"> {{$value->aufgabenname}}
                        <div  class="glyphicon glyphicon-minus icon-right"></div>
                    </div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group panelabstand" >
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                        </div>
                        <div class=" panel-group panelabstand" >
                            <div class="col-md-3  col-xs-6 size">Upload am :</div>
                            <div class="col-md-3  col-xs-6 size"> {{$value->upload_am}}</div>
                            <div class="col-md-3  col-xs-6 size">Datei löschen:</div>
                            <div class="col-md-3  col-xs-4 size">
                                {{--<form action="{{ url('Aufgabenansicht') }}/{{$value->abgabeid }}"--}}
                                {{--onsubmit="return confirm('Sind Sie sicher, dass Sie die Datei von {{ $value->abgabeid}} wirklich löschen wollen?')"--}}
                                {{--method="get" >--}}
                                {{--{{ csrf_field() }}--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--<button class="btn-primary btn" style="padding: 0px 12px;" type="submit">Delete--}}
                                {{--</button>--}}

                                <form action="/delete" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <input type="hidden" name="abgabeid" value="{{$value->abgabeid}}">
                                    <button type="submit" class="btn-primary btn">Delete</button>
                                </form>

                            </div>
                        </div>
                        <div class="panel-group panelabstand">
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a
                                            href="mailto:{{$value->tutoremail}}?subject=Frage zur {{$value->aufgabenname}} von {{$value->name}}"
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
                                    @if (count($abgaben)==0)
                                        <p> Es wurden keine mit deiner Suchanfrage übereinstimmenden Aufgaben gefunden.</p>
    @endif



@endsection