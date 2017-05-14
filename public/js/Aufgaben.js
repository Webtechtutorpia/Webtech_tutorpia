

$(document).ready(function () {

    $("li[name='Aufgaben']").css('background-color','#f5f8fa');
});


$( "input[name='first_name']" );
function Bodyhandler(){
// $(".panel panel-default").onclick(function(){
    console.log('getroffen');
    var Bodyelement = $(event.target).parent().children('.panel-body');
    if($(Bodyelement).is(':visible')){
        $(Bodyelement).hide('slow', 'linear');
        //$(".panel-body").hide('slow','linear');
    }
    else {
        //$(".panel-body").show('slow','linear');
        console.log('öffnen');
        $(Bodyelement).show();
    }


// })

}