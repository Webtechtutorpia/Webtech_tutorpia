
@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($myinputs as $key)
            <p>{{$key->id}}</p>

            @endforeach
    </div>
@endsection