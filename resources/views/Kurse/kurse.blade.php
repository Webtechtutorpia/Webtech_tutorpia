@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Kurse']").css('background-color', '#f5f8fa');
        });</script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Kursübersicht</h3>
                <br>
            </div>
                    <div class="panel-group">
                        <div class="col-md-8">
                            <div class="panel panel-success ">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="success">
                                            <th class="col-md-3">Kurse</th>
                                            <th class="col-md-2">Rolle</th>
                                            <th class="col-md-3 text-center"></th>
                                            <th class="col-md-3"></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (Session::has('message'))
                                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                                        @endif
                                        {{--je nach Datenbankeintrag Element anzeigen--}}
                                        @foreach($myinputs as $key => $value)
                                        <tr>
                                            <td>{{$value->kurs}}</td>
                                            <td>{{$value->rolle}}</td>
                                            @if($value->rolle=="Professor")
                                                <td class="text-center"><a
                                                class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                href="{{ url('/Professor') }}/{{$value->id}}" role="button">ProfMode</a></td>
                                                <td class="text-center"><a
                                                class="btn btn-primary btn-md col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-3"
                                                href="{{ url('/Tutor')}}/{{$value->id}} " role="button">Abgabenübersicht</a></td>
                                                @endif
                                            @if($value->rolle=="Tutor")
                                                <td class="text-center"><a
                                                            class="btn btn-primary btn-md col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-3"
                                                            href="{{ url('/Tutor') }}/{{$value->id}}" role="button">Abgabenübersicht</a></td>
                                                <td></td>
                                            @endif
                                            @if($value->rolle=="Student")
                                                <td class="text-center"><a
                                                class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                href="{{ url('/aufgabe_example') }}" role="button">Aufgabenstatus</a>
                                                </td>
                                                <td></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-success">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="success">
                                            <th class="col-md-4">andere Kurse</th>
                                            <th class="col-md-6"></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (Session::has('message'))
                                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                                        @endif
                                        {{--je nach Datenbankeintrag Element anzeigen--}}
                                        @foreach($alle as $key2 => $value2 )
                                            @if($value2 != $value)
                                        <tr>
                                            <td>{{$value2->kurs}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
        </div>
                    </div>








@endsection

