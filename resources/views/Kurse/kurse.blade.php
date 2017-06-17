@extends('layouts.app')

@section('content')
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
                                                        href="{{ url('/Professor') }}/{{$value->kurs}}" role="button">ProfMode</a>
                                            </td>
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-3"
                                                        href="{{ url('/Tutor')}}/{{$value->kurs}} " role="button">Abgabenübersicht</a>
                                            </td>
                                        @endif
                                        @if($value->rolle=="Tutor")
                                            {{--<td class="text-center"><a--}}
                                            {{--class="btn btn-primary btn-md col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-3"--}}
                                            {{--href="{{ url('/Tutor') }}/{{$value->kurs}}" role="button">Abgabenübersicht</a></td>--}}
                                            {{--<td></td>--}}
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="{{ url('/Tutor') }}/{{$value->kurs}}" role="button">Abgabenübersicht</a>
                                            </td>
                                            <td></td>
                                        @endif
                                        @if($value->rolle=="Student")
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="{{ url('/Aufgabenansicht') }}/{{$value->kurs}} "
                                                        role="button">Aufgabenstatus</a>
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
                                    {{--<th class="col-md-4">Rolle</th>--}}
                                    <th class="col-md-6"></th>


                                </tr>
                                </thead>
                                <tbody>
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                {{--je nach Datenbankeintrag Element anzeigen--}}
                                @foreach($alle as $key2 => $value2 )

                                    <tr>
                                        <td>{{$value2->bezeichnung}}</td>
                                        {{--<td>{{$value2->rolle}}</td>--}}
                                        <td class="text-center">
                                            <form class="form-horizontal" role="form" method="POST"
                                                  action="{{ url('Kurse') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="kurs" value="{{$value2->bezeichnung}}">
                                                {{--<input type="hidden" name="rolle" value="{{$value2->rolle}}">--}}
                                                <button type="submit" class="btn btn-primary btn-md col-md-offset-3">
                                                    eintragen
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Kurse']").css('background-color', '#f5f8fa');
        });</script>
@endsection

