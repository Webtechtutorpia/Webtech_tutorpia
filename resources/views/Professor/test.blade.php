
@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($myinputs as $key => $value)
            <p>{{$value->name}}</p>
            @endforeach
    </div>
@endsection