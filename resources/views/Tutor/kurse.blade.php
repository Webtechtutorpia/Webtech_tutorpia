@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

    <div class="panel-group">
            <div class="col-md-7">
            <div class="panel panel-success ">
                <div class="panel-heading">eingetragene Kurse</div>
                <div class="panel-body">ALDA<a class="btn btn-primary btn-md col-md-offset-7" href="{{ url('/abgabe') }}" role="button">Abgabenübersicht</a></div>
                <div class="panel-body">EIPRO<a class="btn btn-primary btn-md col-md-offset-7" href="{{ url('/abgabe') }}" role="button">Abgabenübersicht</a></div>
            </div>
    </div>
        <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">andere Kurse</div>
            <div class="panel-body">WAST 1<button type="button" class="btn btn-primary btn-md col-md-offset-6">eintragen</button></div>
        </div>
        </div>

    </div>
    </div>
    </div>



    @endsection