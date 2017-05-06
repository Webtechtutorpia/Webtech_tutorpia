@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-success">
                <div class="panel-heading"></div>

                <div class="panel-body">

                    <h1>{{$user->name}}</h1>
                    <h1>{{$userb->name}}</h1>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
