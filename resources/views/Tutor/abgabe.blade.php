@extends('layouts.app')

@section('content')
    {{--Problem jquery aus layouts lädt nicht schnell genug--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script> $( document ).ready(function() {
            $("li[name='Abgaben']").css('background-color', '#f5f8fa');
        });</script>
    <script type="text/javascript" src="{{ URL::asset('js/Abgabe.js') }}"></script>
    @if (Auth::user()->rolle=="Tutor" || Auth::user()->rolle=="Professor" )
        <div class="container">
            <div class="row">
                <h2>Tutorenmodus: ALDA</h2>

                <div class="col-md-4 col-md-offset-8" id="anhang">
                    <div class="input-group">
                        <form method="get" action="/search">
                            <input type="text" class="form-control" placeholder="Suche nach..." name="tfsearch"
                                   onkeypress="search(this.value)">
                            <span class="input-group-btn">
             <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"
                                                                 aria-hidden="true"></span></button></span>
                        </form>
                    </div>
                </div>
                <button onclick="add()"> add</button>
                <button onclick="remove()">remove</button>
                <div id="ausgabe">hallo</div>
                {{--<div class="table-responsive">--}}
                <table class="table table-responsive" id="tabelle">
                    <thead>
                    <tr id="head">
                        <th> Name</th>
                    </tr>
                    </thead>
                </table>

                <table class="table">
                <thead>
                <tr>
                <th class="col-md-3 col-xs-3">Name</th>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    {{--je nach Datenbankeintrag Element anzeigen--}}
                    @foreach($myinputs as $key => $value)
                <th class="col-md-1 col-xs-1">{{$value->aufgabenname}}</th>
                        @endforeach

                </tr>
                </thead>
                <tbody>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                {{--je nach Datenbankeintrag Element anzeigen--}}
                @php($id=0)
                @foreach($ergebnismenge as $key2 => $zeile )
                    @if($id ==0)
                        <tr>
                            <td>{{$zeile->name}}</td>

                            @endif

                    @if($zeile->id!=$id && $id!="")
                        </tr>
                        <tr>
                                <td>{{$zeile->name}}</td>


                {{--<td class="text-center"><a href="{{ url('/aufgabe_example') }}" class="glyphicon glyphicon-minus btn-warning"></a></td>--}}
                {{--<td class="text-center"><a href="{{ url('/aufgabe_example') }}" class="glyphicon glyphicon-remove btn-danger"></a></td>--}}
                {{--<td class="text-center"><a href="{{ url('/aufgabe_example') }}" class="glyphicon glyphicon-ok btn-success"></a></td>--}}
                <td>{{$zeile->zustand}}</td>

                        @else
                        <td>{{$zeile->zustand}}</td>
                    @endif
                @php($id=$zeile->id)
                @endforeach
                        </tr>

                </tbody>
                </table>


            </div>
        </div>

    @endif
@endsection