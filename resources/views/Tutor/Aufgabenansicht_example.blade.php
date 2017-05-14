@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
        });</script>
    <script type="text/javascript" src="{{ URL::asset('js/Aufgaben.js') }}"></script>

    <div class="container">
        <div class="row">

            <h2>Studentenmodus: DBIS</h2>
        </div>
        <div class="col-md-12 col-xs-12 ">
            <h4> Übungsblatt 1</h4>
            <div class="panel panel-success aufgabe ">
                <div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 1
                    <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                </div>
                <div class="panel-body">
                    <div class=" panel-group" style="padding-bottom: 1%">
                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                        <div class="col-md-9 col-xs-12 size"> Aufgaben 1</div>
                    </div>

                    <div class="panel group" style="padding-bottom: 1%">
                        <div class="col-md-3 col-xs-6 size ">Upload am:</div>
                        <div class="col-md-3 col-xs-6 size ">21.04.2017 18:34</div>
                        <div class="col-md-3 col-xs-6 size"> korregiert am:</div>
                        <div class="col-md-3  col-xs-6 size"> 22.04.2017 15:29</div>
                    </div>

                    <div class="panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size">Abnahme durch:</div>
                        {{--Word-wrap beachten--}}
                        <div class="col-md-3 col-xs-6 size" style="text-align: bottom"> Tutor1</div>

                        <div class="col-md-3 col-xs-6 size"> korregierte Version:</div>
                        {{--<td class="col-md-1 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>--}}
                        <div class="col-md-3 col-xs-4 size">
                            <button class="btn-primary btn " style="padding: 0px 12px;" type="button">Download
                            </button>
                        </div>
                    </div>
                    <div class="panel-group " style=";">
                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                        <div class="col-md-9 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>
                        </div>
                    </div>
                    <div class="panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-2  col-xs-12 size">Kommentar:</div>
                        {{--word-wrap--}}
                        <div class="col-md-10 col-xs-12 size">nichts zu beanstanden. sehr gut weiter so!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12 ">
            <h4> Übungsblatt 2</h4>
            <div class="panel panel-warning aufgabe ">
                <div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 3
                    <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                </div>
                <div class="panel-body">
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                        <div class="col-md-9 col-xs-12 size"> Aufgabe 3</div>
                    </div>
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3  col-xs-6 size">Upload am :</div>
                        <div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>
                        <div class="col-md-3  col-xs-6 size">Datei löschen:</div>
                        <div class="col-md-3  col-xs-4 size">
                            <button class="btn-primary btn" style="padding: 0px 12px;" type="button">Delete</button>
                        </div>
                    </div>
                    <div class="panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                        <div class="col-md-3 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>
                        </div>
                        <div class="col-md-3 col-xs-12"> Status:</div>
                        <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-warning aufgabe ">
                <div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 4
                    <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                </div>
                <div class="panel-body">
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                        <div class="col-md-9 col-xs-12 size"> Aufgabe 3</div>
                    </div>
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                        <div class="col-md-3  col-xs-6 size"> 30.05.2017 19:55</div>
                        <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                        <div class="col-md-3  col-xs-4 size">
                            <button class="btn-primary btn" style="padding: 0px 12px;" type="button">Upload</button>
                        </div>
                    </div>
                    <div class="panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                        <div class="col-md-3 col-xs-2 size"><span><a href
                                                                     class="glyphicon glyphicon-envelope"></a></span>
                        </div>
                        <div class="col-md-3 col-xs-12"> Status:</div>
                        <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <h4> Übungsblatt Nr 4</h4>
            <div class="panel panel-danger aufgabe ">
                <div class="panel-heading" onclick="Bodyhandler()"> Aufgabe 2
                    <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div></div>
                    <div class="panel-body">
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"> Übungblatt Nr 2 Aufgaben 1-4</div>
                        </div>
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3  col-xs-6 size">Abgabe bis:</div>
                            <div class="col-md-3  col-xs-6 size"> 20.04.2017 19:55</div>
                            <div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>
                            <div class="col-md-3 col-xs-6 size">20.04.2017 19:55</div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>
                            </div>
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size"> Abgabzeitpunkt verstrichen</div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-2  col-xs-12 size">Kommentar:</div>
                            {{--word-wrap--}}
                            <div class="col-md-12 col-xs-12 size">(Auto Generated) Abgabezeitpunkt verstrichen
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    </table>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
@endsection
{{--<div class="table-responsive">--}}
{{--<table>--}}
{{--<Tr>--}}
{{--<td class="col-md-1 col-xs-2 size"> Aufgabenstellung:</td>--}}
{{--<td class="col-md-4 col-xs-10 size"> Übungblatt Nr 1 Aufgaben 1 & 2</td>--}}
{{--</Tr>--}}
{{--<Tr>--}}
{{--<td class="col-md-1 col-xs-2 size">Upload am:</td>--}}
{{--<td class="col-md-2 col-xs-10 size"><span--}}
{{--class="label label-default size"> 21.04.2017 18:30 </span></td>--}}
{{--<td class="col-md-1 size"> korregiert am:</td>--}}
{{--<td class="col-md-1 size"><span--}}
{{--class="label label-default size"> 22.04.2017  15:29 </span></td>--}}
{{--</Tr>--}}
{{--<Tr>--}}
{{--<td class="col-md-1 size">abgenommen durch:</td>--}}
{{--<td class="col-md-2 size"><span class="label label-default size"> Tutor1 </span>--}}
{{--</td>--}}
{{--<td class="col-md-1 size"> korregierte Version:</td>--}}
{{--<td class="col-md-1 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>--}}
{{--<td class="col-md-1 size">--}}
{{--<button class="btn-primary btn " type="button">Download</button>--}}
{{--</td>--}}
{{--</Tr>--}}
{{--<Tr>--}}
{{--<td class="col-md-1 size">Kommentar:</td>--}}
{{--<td class="col-md-4 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>--}}
{{--<td class="col-md-4 size"><span class="label label-default size"> nichts zu beanstanden. sehr gut weiter so! </span>--}}
{{--</td>--}}
{{--<td class="col-md-1 size"> Tutoren kontaktieren:</td>--}}
{{--<td class="col-md-1 size"><span> <a href class="glyphicon glyphicon-envelope"></a>   </span>--}}
{{--</td>--}}
{{--</Tr>--}}
{{--</table>--}}