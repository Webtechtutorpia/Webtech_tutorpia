@extends('layouts.app')

@section('content')
    @foreach($myinputs as $key => $value)
        <p>{{$value}}</p>
    @endforeach
    @endsection