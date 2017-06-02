
$( document ).ready(function() {
    $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});

function Bodyhandler(element){
    var Bodyelement = $(element).parent().children('.panel-body');
    if($(Bodyelement).is(':visible')){
        $(Bodyelement).hide('slow','linear');
        //$(".panel-body").hide('slow','linear');
    }
    else {
        //$(".panel-body").show('slow','linear');
        console.log('öffnen');
        $(Bodyelement).show('slow','linear');
    }
}
function ajaxSearch(name){
    $("#liste").load("/Aufgabenansicht/ajaxcityList?name="+name)
};

function add(element){
    $(".austauschen").hide();
    $(".fileUpload").show();
}