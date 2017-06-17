
$( document ).ready(function() {
    $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});

function ajaxSearch(name){
    $("#liste").load("/Aufgabenansicht/ajaxAufgabenansicht?name="+name)
};

function add(element){
    $(".austauschen").hide();
    $(".fileUpload").show();
}