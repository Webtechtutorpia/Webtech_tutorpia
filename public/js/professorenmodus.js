
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

function add(element) {
    console.log("blah");
    var div = $('<div/>', {class: "col-md-11"});
    var panel = $('<div/>', {class: "panel panel-default"});
    var heading = $('<div/>', {class: "panel-heading"});
    //Heading Elements
    var icon1 = $('<i/>', { class: "glyphicon glyphicon-trash middlesize-right", style: "display: inline"});
    var icon2 = $('<i/>', { class: "glyphicon glyphicon-cog middlesize-right", style: "display: inline"});
    $(heading).click(  function(){
        Bodyhandler(this);
    });
    //Body Elements
    var body = $('<div/>', {class: "panel-body", style: "display:none"});
    var formbeginn=$('<form>', {method: "post"});
    var formend=$('</form>');
    var label1 = $('<label> Aufgabenname </label>',{ class: "control-label", for: "Aufgabenname"});
    var tf1= $('<input/>',{ type: "text", name: "Aufgabenname", placeholder : "Aufgabenname"});

    var label2 = $('<label> Abgabedatum </label>',{ class: "control-label", for: "Abgabedatum"});
    var tf2= $('<input/>',{ type: "text", name: "Abgabedatum", placeholder : "01.01.2017 23:59"});

    var label3 = $('<label> Aufgabstellung </label>',{ class: "control-label", for: "Aufgabenbeschreibung"});
    var ta= $('<textarea/>',{ type: "text", name: "Abgabedatum", placeholder : "Hier Aufgabenstellung eintragen"});

    var abschicken = $('<button> abschicken </button>').addClass('btn btn-primary');
    //flaot fehlt noch
    heading.html("Aufgabe X");
    //Append heading
    $(heading).append(icon1);
    $(heading).append(icon2);
    $(panel).append(heading);
    //Append body
    $(body).append(formbeginn).append(label1);
    $(body).append(tf1);
    $(body).append(label2).append(tf2);

     $(body).append(label3).append(ta);
    $(body).append(abschicken).append(formend);
    $(panel).append(body);


    $(div).append(panel);

    $(element).after(div);
}

function remove(){
    console.log("trifft");
    //var deleteElement= $(event.target).parent().parent().parent();
    //remove(deleteElement);
}