
function Bodyhandler(){

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


}

function add() {
    var div = $('<div/>', {class: "col-md-11"});
    var panel = $('<div/>', {class: "panel panel-default"});
    var heading = $('<div/>', {class: "panel-heading"});
    //Heading Elements
    var icon1 = $('<i/>', { class: "glyphicon glyphicon-trash middlesize-right", style: "display: inline"});
    var icon2 = $('<i/>', { class: "glyphicon glyphicon-cog middlesize-right", style: "display: inline"});
    $(heading).on("click", heading, function(){
        Bodyhandler()
    });
    //Body Elements
    var body = $('<div/>', {class: "panel-body", style: "display:none"});
    var label1 = $('<label> Aufgabenname </label>',{ class: "control-label", for: "Aufgabenname"});
    var tf1= $('<input/>',{ type: "text", name: "Aufgabenname", placeholder : "Aufgabenname"});
    heading.html("Aufgabe X");
    //Append heading
    $(heading).append(icon1);
    $(heading).append(icon2);
    $(panel).append(heading);
    //Append body
    $(body).append(label1);
    $(body).append(tf1);
    $(panel).append(body);
    $(div).append(panel);

    $(event.target).after(div);
}

function remove(){
    console.log("trifft");
    //var deleteElement= $(event.target).parent().parent().parent();
    //remove(deleteElement);
}