@extends('layouts.app')

@section('content')
    <h3> gesuchte Aufgaben: </h3>
    @foreach ($cities as $value)
            <div class="col-md-12 col-xs-12">
                @if($value->zustand == '/' )

                    <div class="panel panel-warning aufgabe " >
                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                            <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                        </div>
                        @endif
                        @if( $value->zustand == '.')
                            <div class="panel panel-info aufgabe ">
                                <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                    <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                                </div>
                                @endif
                                @if($value->zustand == '+')
                                    <div class="panel panel-success aufgabe ">
                                        <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                            <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                                        </div>
                                        @endif
                                        @if($value->zustand == '-')
                                            <div class="panel panel-danger aufgabe ">
                                                <div class="panel-heading" onclick="Bodyhandler(this)"> {{$value->aufgabenname}}
                                                    <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div>
                                                </div>

                                                @endif


                                                <div class="panel-body">
                                                    <div class=" panel-group" style="padding-bottom: 1%;">
                                                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                                        <div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>
                                                    </div>
                                                    <div class=" panel-group" style="padding-bottom: 1%;">
                                                        <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                                                        <div class="col-md-3  col-xs-6 size"> {{$value->abgabedatum}}</div>
                                                        <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                                                        <div class="col-md-3  col-xs-4 size">
                                                            <a class="btn btn-primary btn"  href="{{ url('/FileUpload') }}" role="button">Upload</a>


                                                        </div>
                                                    </div>
                                                    <div class="panel-group" style="padding-bottom: 1%;">
                                                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                                                        <div class="col-md-3 col-xs-2 size"><span><a href
                                                                                                     class="glyphicon glyphicon-envelope"></a></span>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12"> Status:</div>
                                                        @if($value->zustand == '.')
                                                            <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                                                        @endif
                                                        @if($value->zustand == '/')
                                                            <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                                                        @endif
                                                        @if($value->zustand == '+')
                                                            <div class="col-md-3 col-xs-12 size">erfolgreich abgenommen</div>
                                                        @endif
                                                        @if($value->zustand == '-')
                                                            <div class="col-md-3 col-xs-12 size">Abgabe nicht erfolgreich</div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                    </div>

    @endforeach



@endsection