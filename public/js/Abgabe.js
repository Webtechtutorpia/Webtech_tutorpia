$( document ).ready(function() {
    $("li[name='Abgaben']").css('background-color','#f5f8fa');
    console.log( "ready!" );
    // // aufgaben auslesen
    // $.getJSON("/tabelle?fach=1", function (data){
    //     $.each(data, function(index,aufgabe) {
    //         $('#head').append('<th>'+aufgabe.aufgabenname+'</th>');
    //     });
    //   $('#head').append('</thead>');
    //   $('#tabelle').append('</table>');
    // });
   // search('');

    //Ausführung bei Eingabe in das Textfeld
    $('#tfsearch').on('input change', function () {

       search2($('#tfsearch').val());
    })

});

//global variable
var wait=false;
    // function search(name) {
    // //nachfragen delay und Buchstabe zuwenig Problem
    //     while(wait===true) {
    //     console.log(wait);
    //      }
    //     wait=true;
    //     console.log('beginn');
    //     remove();
    //     $('#ausgabe').html("");
    //    var x= jQuery('<tbody></tbody>');
    //     $.getJSON( "/json?tfsearch="+name, function(data) {
    //         $.each(data, function (index, user) {
    //             // var link = "<p>"+user.name +"</p>";
    //             $(x).append('<tr><td>' + user.name + '</td></tr>');
    //             $(x).appendTo('#tabelle');
    //             //  $(link).appendTo("#ausgabe");
    //         });
    //     });
    //     wait=false;
    //     console.log('ende');
    // };

    //globale variable
    var counter=0, stand=0;
function search2(name) {
    //nachfragen delay und Buchstabe zuwenig Problem
$.ajax( {url: "/json?tfsearch="+name+"&id="+counter,   success: function(result) {
    var x="";
        //gültiger Ajax
            $.each(result.users, function (index,user) {
             x +='<tr><td>' + user.name + '</td>';

             $.each(result.abgaben, function (index, abgabe) {
                if (abgabe.user==user.id){
            console.log(abgabe.zustand);
                    switch(abgabe.zustand){
                        case '+':
                            x+= '<td>';
                        // <span class=""></span>

                             x+= '<a href="#">'+ "\+" + '</a>'
                            // var icon2 = $('<i/>', { class: "glyphicon glyphicon-cog middlesize-right", style: "display: inline"});
                            x+='</td>';
                        case '-':
                            x+= '<td>';
                            x+=  '<button value=\"hallo\">';
                            //x+= '<a href="#">-</a>';
                            x+='</td>';

                    }

                 }
             });
                x+='</tr>';
             });

            $('tbody').html(x);









        // console.log(result[0]);
        // console.log(result.length);
        // console.log(result[0][result.length-1]);
    // $.getJSON( "/json?tfsearch="+name, function(data) {
    //     $.each(result, function (index, user) {
    //         // var link = "<p>"+user.name +"</p>";
    //         if ( user!=user.name){
    //         user = user.name;
    //         $(x).append('<tr><td>' + user.name + '</td></tr>');
    //         };
    //
    //
    //         $(x).appendTo('#tabelle');
    //         //  $(link).appendTo("#ausgabe");
    //         console.log()
    //     });
    }, error: function(){
        alert('fehler');
    }});
    // });
};


    // ungenutzt
// function add(){
//
//     jQuery('<tbody/>').append(jQuery('<tr/>')).append(jQuery('<td>hallo text </td>')).appendTo('#tabelle');
//     //jQuery('<div/> Ich bin ein text </div>',{ id:"output"}).appendTo('#tabelle');
//    // $('#tabelle').append(jQuery('<div> Hallo du </div>'));
//     console.log('hier');
//   $('#output').append().query('<p/>').append('Ich bin ein Text');
//   $('#tabelle').append('#output');
//     //    var anfang = '<tbody><tr>';
//     // var td1='<td/>';
//     // console.log("21");
//     // $(td1).html('Beispiel');
//     // var ende= '</tr></tbody>';
//     // console.log("24");
//     // $('#tabelle').append(anfang).append(td1).append(ende);
//
//     $('')
// }

function remove(){
    var x =$('#tabelle').find('tbody').remove();
    console.log('gelöscht');

}

