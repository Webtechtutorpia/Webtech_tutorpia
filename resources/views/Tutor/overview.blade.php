@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">

    <div class="col-md-6 col-md-offset-6">
        <div class="panel panel-default">
            <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"::before></span><b>Neueste Aktivitäten</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="demo2" style="overflow-y: hidden; height: 280px;"><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="overflow: hidden; height: 59.2754px; padding-top: 3.43625px; margin-top: 0px; padding-bottom: 3.43625px; margin-bottom: 0px;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="display: none;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li><li style="display: none;" class="news-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in venenatis enim... <a href="#">Read more...</a></li>




                            <a href="#" class="btn btn-primary" onclick="window.open(
				      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://bootsnipp.com/snippets/mvWZz') +'&amp;t=' + encodeURIComponent('news box #Bootstrap #snippet'),
				      'facebook-share-dialog',
				      'width=626,height=436,top='+((screen.height - 436) / 2)+',left='+((screen.width - 626)/2 ));
				    return false;">
                                <i class="icon-facebook"></i>
                            </a>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection