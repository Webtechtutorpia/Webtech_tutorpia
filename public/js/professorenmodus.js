

//
//
// $(document).ready(function() {
//    console.log($("input[name='aufgabenname']").val());
//     console.log('ready');
//     var x=jQuery('<div>hier ist ein text </div>',{id:"hi"}).appendTo('#test');
//     $.getJSON("/leseaufgaben?fach=1", function (data){
//         $.each(data, function(index,aufgabe) {
//             $('#test').append('<div>'+aufgabe.aufgabenname+'</div>');
//             load(aufgabe.aufgabenname, aufgabe.aufgabenbeschreibung);
//             //Frage warum reagiert Javascript nicht auf neu erstellte ids?
//           //  $('#hi').html(aufgabe.aufgabenname);
//         });
//
//     });
//
// });


//Body von Element öffnen
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

// function load(name,beschreibung) {
//     console.log("blah");
//     var div = $('<div/>', {class: "col-md-11"});
//     var panel = $('<div/>', {class: "panel panel-default"});
//     var heading = $('<div/>', {class: "panel-heading"});
//     $(heading).html('<b>'+name +'</b>');
//     //Heading Elements
//     var icon1 = $('<i/>', { class: "glyphicon glyphicon-trash middlesize-right", style: "display: inline"});
//     $(icon1).click( function () {
//         remove(this);
//     });
//     var icon2 = $('<i/>', { class: "glyphicon glyphicon-cog middlesize-right", style: "display: inline"});
//     $(heading).click(  function(){
//         Bodyhandler(this);
//     });
//     //Body Elements
//     var body = $('<div/>', {class: "panel-body", style: "display:none"});
//     var formbeginn=$('<form>', {method: "post"});
//     var formend=$('</form>');
//     var label1 = $('<label> Aufgabenname </label>',{ class: "control-label", for: "Aufgabenname"});
//     var tf1= $('<input/>',{ type: "text", name: "Aufgabenname", placeholder : name});
//
//     var label2 = $('<label> Abgabedatum </label>',{ class: "control-label", for: "Abgabedatum"});
//     var tf2= $('<input/>',{ type: "text", name: "Abgabedatum", placeholder : "01.01.2017 23:59"});
//
//     var label3 = $('<label> Aufgabstellung </label>',{ class: "control-label", for: "Aufgabenbeschreibung"});
//     var ta= $('<textarea/>',{ type: "text", name: "Abgabedatum", placeholder : beschreibung});
//
//     var abschicken = $('<button> abschicken </button>').addClass('btn btn-primary');
//     //flaot fehlt noch
//     //Append heading
//     $(heading).append(icon1);
//     $(heading).append(icon2);
//     $(panel).append(heading);
//     //Append body
//     $(body).append(formbeginn).append(label1);
//     $(body).append(tf1);
//     $(body).append(label2).append(tf2);
//
//     $(body).append(label3).append(ta);
//     $(body).append(abschicken).append(formend);
//     $(panel).append(body);
//
//
//     $(div).append(panel);
// //Warum geht nicht $('#plus);???ß
//     $('#test').after(div);
// }




function add(element){
    $(".neueAufgabe").show();
}


function verstecken(element){
    $(".neueAufgabe").hide();
}

function buttonFaerben(element){
    $(".speichern").prop('disabled', false);
}





// function add(element) {
//     console.log("blah");
//     var div = $('<div/>', {class: "col-md-11"});
//     var panel = $('<div/>', {class: "panel panel-default"});
//     var heading = $('<div/>', {class: "panel-heading"});
//     //Heading Elements
//     var icon1 = $('<i/>', { class: "glyphicon glyphicon-trash middlesize-right", style: "display: inline"});
//     $(icon1).click( function () {
//         remove(this);
//     });
//     var icon2 = $('<i/>', { class: "glyphicon glyphicon-cog middlesize-right", style: "display: inline"});
//     $(heading).click(  function(){
//         Bodyhandler(this);
//     });
//     //Body Elements
//     var body = $('<div/>', {class: "panel-body", style: "display:none"});
//     var formbeginn=$('<form>', {method: "POST",action:"{{ url('Professor') }}"});
//     var formend=$('</form>');
//     var label1 = $('<label> Aufgabenname </label>',{ class: "control-label", for: "Aufgabenname"});
//     var tf1= $('<input/>',{ type: "text", name: "aufgabenname", placeholder : "Aufgabenname"});
//
//     var label2 = $('<label> Abgabedatum </label>',{ class: "control-label", for: "Abgabedatum"});
//     var tf2= $('<input/>',{ type: "text", name: "abgabedatum", placeholder : "01.01.2017 23:59"});
//
//     var label3 = $('<label> Aufgabstellung </label>',{ class: "control-label", for: "Aufgabenbeschreibung"});
//     var ta= $('<textarea/>',{ type: "text", name: "aufgabebeschreibung", placeholder : "Hier Aufgabenstellung eintragen"});
//
//     var abschicken = $('<button> Hinzufügen </button>',{onclick: "update()"}).addClass('btn btn-primary');
//     //flaot fehlt noch
//     heading.html("Aufgabe X");
//     //Append heading
//     $(heading).append(icon1);
//     $(heading).append(icon2);
//     $(panel).append(heading);
//     //Append body
//     $(body).append(formbeginn).append(label1);
//     $(body).append(tf1);
//     $(body).append(label2).append(tf2);
//
//     $(body).append(label3).append(ta);
//     $(body).append(abschicken).append(formend);
//     $(panel).append(body);
//     $(div).append(panel);
//     $(element).after(div);
//
//     //Objekt in Datenbank schreiben
//     $.ajax('/create?aufgabenname='+1 +'&aufgabenbeschreibung=test&kurs=1');
// }

// function update(){
//     $.ajax('/update?aufgabenname='+1 +'&aufgabenbeschreibung=test&kurs=1&id=4');
// }

