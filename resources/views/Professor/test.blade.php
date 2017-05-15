
@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('myinputs') }}">View All Myinputs</a></li>
            </ul>
        </nav>
        <h1>Showing {{ $myinput->id }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $myinput->aufgabenname }}</h2>
            <p>
                <strong>Email:</strong> {{ $myinput->abgabedatum }}<br>
                <strong>Level:</strong> {{ $myinput->aufgabenbeschreibung }}
            </p>
        </div>
    </div>
@endsection