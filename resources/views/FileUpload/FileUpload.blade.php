@extends('layouts.app')
<style> .blue{
        color:blue;
    }</style>
@section('content')

       

        <div class="container">
            <div class="row">

                <div class="">
                    <h3 class="col-md-5" id="test"> Datei auswählen:</h3>
                </div>



                <div class="col-md-11">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('FileUpload') }}" >
                                {{ csrf_field() }}

                                {{--<div class="form group">--}}

                                    {{--<label for="Aufgabenname" class="control-label">Dateiname</label>--}}
                                    {{--<input type="text" class="form-control" name="aufgabenname" id="Aufgabenname" onkeypress="buttonFaerben(this)"--}}
                                           {{--placeholder="Hier Aufgabenname eintragen">--}}
                                {{--</div>--}}

                                <div class="form group">

                                    <input type="file" class="form-control" name="upload" id="File" onkeypress="buttonFaerben(this)">
                                </div>


                                <div class="form-group" style="margin-top: 2em;">
                                    <button type="submit" class="btn btn-primary speichern" value="Abschicken"
                                            style="float: right">
                                       Datei hochladen
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>




@endsection