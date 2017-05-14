@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-success">
                <div class="panel-heading"></div>

                <div class="panel-body">

                    {{--<p>{{ $aufgabenname}}</p>--}}
                    {{--<p>{{ $datum}}</p>--}}
                    <p>{{ $aufgabenname}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

