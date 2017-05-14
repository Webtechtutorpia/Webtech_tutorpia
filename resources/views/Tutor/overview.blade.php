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
                                    <tr>
                                        <td class="col-md-3 col-xs-3"> <p>20.04.17 23:59</p></td>
                                        <td class="col-md-9 col-xs-9"><p>Tutor hat deine Übungsaufgabe Nr 3 im Kurs ALDA
                                                abgenommen.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-xs-3"> <p>28.04.17 15:21</p></td>
                                        <td class="col-md-9 col-xs-9"><p>Dozent hat eine neue Übungsaufgabe erstellt.</p>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection