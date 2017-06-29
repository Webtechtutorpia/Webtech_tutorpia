@extends('layouts.app')

@section('content')
    {{--Problem jquery aus layouts lädt nicht schnell genug--}}

        <div class="container">
            <div class="row">
                <h2>Tutorenmodus: {{$kurs}}</h2>

                <div class="col-md-6 col-md-offset-10" id="anhang">
                    <div class="input-group">
                        <form method="get" action="/search" onsubmit="return false">
                            <input type="text" class="form-control" placeholder="Suche nach..." id="tfsearch">
                        </form>
                    </div>
                </div>

                <table class="table table-responsive table-striped table-bordered" id="tabelle">
                <thead>
                <tr>
                <th class="col-md-3 col-xs-3">Name</th>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    {{--je nach Datenbankeintrag Element anzeigen--}}
                    @foreach($aufgabe as $value)
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

                            @if($zeile->zustand == '+')
                                <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-ok btn-success"></a>
                            @endif
                            @if($zeile->zustand == '-')
                                <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-remove btn-danger"></a></td>
                            @endif
                            @if($zeile->zustand == '.')
                                <td class="text-center"> unbearbeitet</td>

                            @endif
                            @if($zeile->zustand == '/')
                                <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-minus btn-warning"></a></td>
                            @endif

                        @else
                            @if($zeile->zustand == '+')
                                    <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-ok btn-success"></a>
                                @endif
                                @if($zeile->zustand == '-')
                                    <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-remove btn-danger"></a></td>
                                    @endif
                                @if($zeile->zustand == '.')
                                    <td class="text-center">unbearbeitet</td>
                                @endif
                                @if($zeile->zustand == '/')
                                    <td class="text-center"><a href="{{ url('Korrektur/bestimmteAbgabe') }}/{{$zeile->user}}/{{$zeile->aufgabenname}}" class="glyphicon glyphicon-minus btn-warning"></a></td>
                                @endif

                    @endif
                @php($id=$zeile->id)
                @endforeach
                        </tr>

                </tbody>
                </table>


            </div>
        </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('js/minjs/abgabe.min.js') }}"></script>
    {{--@endif--}}
@endsection