@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });</script>
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

            <script>
                function ajaxSearch(name){
                    $("#liste").load("/Aufgabenansicht/ajaxcityList?name="+name)
                };


            </script>


{{--<div class="col-md-12 col-xs-12 ">--}}
            {{--<h4> Übungsblatt 1</h4>--}}

            {{--<div class="panel panel-success aufgabe ">--}}
                {{--<div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 1--}}
                    {{--<div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class=" panel-group" style="padding-bottom: 1%">--}}
                        {{--<div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>--}}
                        {{--<div class="col-md-9 col-xs-12 size">Aufgabe 1</div>--}}
                    {{--</div>--}}

                    {{--<div class="panel group" style="padding-bottom: 1%">--}}
                        {{--<div class="col-md-3 col-xs-6 size ">Upload am:</div>--}}
                        {{--<div class="col-md-3 col-xs-6 size ">21.04.2017 18:34</div>--}}
                        {{--<div class="col-md-3 col-xs-6 size"> korregiert am:</div>--}}
                        {{--<div class="col-md-3  col-xs-6 size"> 22.04.2017 15:29</div>--}}
                    {{--</div>--}}

                    {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                        {{--<div class="col-md-3 col-xs-6 size">Abnahme durch:</div>--}}
                        {{--Word-wrap beachten--}}
                        {{--<div class="col-md-3 col-xs-6 size" style="text-align: bottom"> Tutor1</div>--}}

                        {{--<div class="col-md-3 col-xs-6 size"> korregierte Version:</div>--}}
                        {{--<td class="col-md-1 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>--}}
                        {{--<div class="col-md-3 col-xs-4 size">--}}
                            {{--<button class="btn-primary btn " style="padding: 0px 12px;" type="button">Download--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-group " style=";">--}}
                        {{--<div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>--}}
                        {{--<div class="col-md-9 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                        {{--<div class="col-md-2  col-xs-12 size">Kommentar:</div>--}}
                        {{--word-wrap--}}
                        {{--<div class="col-md-10 col-xs-12 size">nichts zu beanstanden. sehr gut weiter so!--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="col-md-12 col-xs-12 ">--}}
            {{--<h4> Übungsblatt 2</h4>--}}
            {{--<div class="panel panel-warning aufgabe ">--}}
                {{--<div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 3--}}
                    {{--<div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                        {{--<div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>--}}
                        {{--<div class="col-md-9 col-xs-12 size"> Aufgabe 3</div>--}}
                    {{--</div>--}}
                    {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                        {{--<div class="col-md-3  col-xs-6 size">Upload am :</div>--}}
                        {{--<div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>--}}
                        {{--<div class="col-md-3  col-xs-6 size">Datei löschen:</div>--}}
                        {{--<div class="col-md-3  col-xs-4 size">--}}
                            {{--<button class="btn-primary btn" style="padding: 0px 12px;" type="button">Delete</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                        {{--<div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>--}}
                        {{--<div class="col-md-3 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 col-xs-12"> Status:</div>--}}
                        {{--<div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            {{--je nach Datenbankeintrag Element anzeigen--}}
            <h3>Alle Aufgaben:</h3>
            @foreach($myinputs as $key => $value)
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
                                {{--@if($value->zustand == '-')--}}
                                {{--<div class="col-md-12 col-xs-12">--}}
                                    {{--<div class="panel panel-danger aufgabe ">--}}
                                        {{--<div class="panel-heading" onclick="Bodyhandler()"> {{$value->aufgabenname}}--}}
                                            {{--<div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div></div>--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                                                {{--<div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>--}}
                                                {{--<div class="col-md-9 col-xs-12 size"> {{$value->aufgabenname}}</div>--}}
                                            {{--</div>--}}
                                            {{--<div class=" panel-group" style="padding-bottom: 1%;">--}}
                                                {{--<div class="col-md-3  col-xs-6 size">Abgabe bis:</div>--}}
                                                {{--<div class="col-md-3  col-xs-6 size">{{$value->abgabedatum}} </div>--}}
                                                {{--<div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>--}}
                                                {{--<div class="col-md-3 col-xs-6 size">{{$value->abgabedatum}}</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                                                {{--<div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>--}}
                                                {{--<div class="col-md-3 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-3 col-xs-12"> Status:</div>--}}
                                                {{--<div class="col-md-3 col-xs-12 size"> Abgabe nicht erfolgreich</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                                                {{--<div class="col-md-2  col-xs-12 size">Kommentar:</div>--}}
                                                {{--word-wrap--}}
                                                {{--<div class="col-md-12 col-xs-12 size">(Auto Generated) Abgabezeitpunkt verstrichen--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                {{--@if($value->zustand == '+')--}}
                                {{--<div class="col-md-12 col-xs-12 ">--}}

                                {{--<div class="panel panel-success aufgabe ">--}}
                                {{--<div class="panel-heading" onclick="Bodyhandler()"> {{$value->aufgabenname}}--}}
                                {{--<div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body">--}}
                                {{--<div class=" panel-group" style="padding-bottom: 1%">--}}
                                {{--<div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>--}}
                                {{--<div class="col-md-9 col-xs-12 size">{{$value->aufgabenname}}</div>--}}
                                {{--</div>--}}

                                {{--<div class="panel group" style="padding-bottom: 1%">--}}
                                {{--<div class="col-md-3 col-xs-6 size ">Upload am:</div>--}}
                                {{--<div class="col-md-3 col-xs-6 size ">{{$value->created_at}}</div>--}}
                                {{--<div class="col-md-3 col-xs-6 size"> korregiert am:</div>--}}
                                {{--<div class="col-md-3  col-xs-6 size"> {{$value->updated_at}}</div>--}}
                                {{--</div>--}}

                                {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                                {{--<div class="col-md-3 col-xs-6 size">Abnahme durch:</div>--}}
                                {{--Word-wrap beachten--}}
                                {{--<div class="col-md-3 col-xs-6 size" style="text-align: bottom"> Tutor1</div>--}}

                                {{--<div class="col-md-3 col-xs-6 size"> korregierte Version:</div>--}}
                                {{--<td class="col-md-1 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>--}}
                                {{--<div class="col-md-3 col-xs-4 size">--}}
                                {{--<button class="btn-primary btn " style="padding: 0px 12px;" type="button">Download--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="panel-group " style=";">--}}
                                {{--<div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>--}}
                                {{--<div class="col-md-9 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="panel-group" style="padding-bottom: 1%;">--}}
                                {{--<div class="col-md-2  col-xs-12 size">Kommentar:</div>--}}
                                {{--word-wrap--}}
                                {{--<div class="col-md-10 col-xs-12 size">nichts zu beanstanden. sehr gut weiter so!--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                    {{--@endif--}}




            @endforeach


    </div>
    </div>



@endsection
