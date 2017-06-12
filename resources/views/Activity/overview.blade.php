@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $(document).ready(function () {
            $("li[name='Übersicht']").css('background-color', '#f5f8fa');
        });</script>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3>Wilkommen zurück {{ Auth::user()->name }}!</h3>

            </div>


            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><b>Neueste Aktivitäten</b></div>
                    <div class="panel-body">

                        <div class="col-xs-12 col-md-12">
                            <table class="table-responsive">
                                <thead>
                                <tr>
                                    <th class="col-md-4 col-xs-4"><p>Zeit</p></th>
                                    <th class="col-md-8 col-xs-8"><p>Ereignis</p></th>
                                </tr>
                                </thead>
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                {{--je nach Datenbankeintrag Element anzeigen--}}
                                <tbody id="tbody">
                                @foreach($myinputs as $key => $value )
                                    <tr>
                                        @if($value->zustand == '.'|| $value->zustand == '+' || $value->zustand == '-')
                                            <td class="col-md-4 col-xs-8">
                                                <p>{{Carbon\Carbon::parse($value->abgabeupdated_at)->format('d-m-Y H:i:s')}}</p>
                                            </td>
                                        @endif
                                        @if($value->zustand == '.')
                                            <td class="col-md-4 col-xs-8"><p>{{$value->erstellt_von}}
                                                    hat {{$value->aufgabenname}} mit Abgabe am {{$value->abgabedatum}}
                                                    im Kurs {{$value->kurs}} erstellt.</p>
                                            </td>
                                        @elseif($value->zustand == '+' || $value->zustand == '-')
                                            <td class="col-md-4 col-xs-8"><p>{{$value->bearbeitet_von}} hat
                                                    deine {{$value->aufgabenname}} im Kurs {{$value->kurs}}
                                                    geändert.</p>
                                            </td>
                                        @endif
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

    {{--    <script type="text/javascript" src="{{ URL::asset('s/jquery-3.2.1.js') }}"></script>--}}
    <script type="text/javascript" src="{{URL::asset('js/Overview.js')}}"></script>
@endsection

