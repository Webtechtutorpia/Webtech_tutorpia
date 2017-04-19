@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <h3> Herzlich Willkommen zurück Max Mustermann!</h3>

            <button type="button" class="btn btn-fb"><i class="fa fa-facebook left"></i> Facebook</button>
        </div>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading"><b>Neueste Aktivitäten</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="demo2" style="overflow-y: hidden; height: 280px;"><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="overflow: hidden; height: 59.2754px; padding-top: 3.43625px; margin-top: 0px; padding-bottom: 3.43625px; margin-bottom: 0px;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="display: none;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="display: none;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection