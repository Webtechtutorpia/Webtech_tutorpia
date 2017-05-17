@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Übersicht']").css('background-color', '#f5f8fa');
        });</script>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
        <h3>Wilkommen zurück {{ Auth::user()->name }}!</h3>

    </div>



            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading"><b>Neueste Aktivitäten</b></div>
                    <div class="panel-body">

                            <div class="col-xs-12 col-md-12">
                                <table class="table-responsive">
                                    <tr>
                                        <th class="col-md-3 col-xs-3"><p>Zeit</p></th>
                                        <th class="col-md-9 col-xs-9"><p>Ereignis</p></th>
                                    </tr>
                                    @if (Session::has('message'))
                                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                                    @endif
                                    {{--je nach Datenbankeintrag Element anzeigen--}}

                                    @foreach($myinputs as $key => $value)
                                    <tr>
                                        <td class="col-md-3 col-xs-3"> <p>{{$value->created_at}}</p></td>
                                        @if($value->zuordnung_aufgabe != NULL)
                                            <td class="col-md-9 col-xs-9"><p>{{$value->bearbeitet_von}} hat {{$value->aufgabenname}} mit Abgabe am {{$value->abgabedatum}} erstellt.</p>
                                            </td>

                                        @else
                                        <td class="col-md-9 col-xs-9"><p>{{$value->bearbeitet_von}} hat deine {{$value->aufgabenname}} im Kurs ALDA
                                                abgenommen.</p>
                                        </td>
                                        @endif
                                    </tr>

@endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection