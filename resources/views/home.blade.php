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
{{--                    <p>{{ $aufgabenname}}</p>--}}
                    <style> .link{
                            color: #45a049;
                            font-size: 18px;
                        }</style>
                    Diese Seite ist nur für angemeldete User nutzbar. Registriere dich <a href="/register" class="link"> hier </a>oder logge dich <a href="/login" class="link">hier</a> ein um diese Seite im vollen Umfang nutzen zu können.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

