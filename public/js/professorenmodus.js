
function Bodyhandler(){
//
// $(".panel panel-default").onclick(function(){
    console.log('getroffen');
    var Bodyelement = $(event.target).parent().children('.panel-body');
    if($(Bodyelement).is(':visible')){
        $(Bodyelement).hide();
        //$(".panel-body").hide('slow','linear');
    }
    else {
        //$(".panel-body").show('slow','linear');
        console.log('öffnen');
        $(Bodyelement).show();
    }


// })

}

// $(function(){
//
//
//     $('.panel-heading').click(function(){
//         {
//             console.log('getroffen');
//
//         }
//     })
//
//
// }


function plus () {
$("#test").hide();
}


$("#test").mouseover(function(){
    $("#test").css("background-color", "yellow");
});