$( document ).ready(function() {
    $("li[name='Abgaben']").css('background-color','#f5f8fa');
    console.log( "ready!" );
    // aufgaben auslesen
    $.getJSON("/tabelle?fach=1", function (data){
        $.each(data, function(index,aufgabe) {
            $('#head').append('<th>'+aufgabe.aufgabenname+'</th>');
        });
      $('#head').append('</thead>');
      $('#tabelle').append('</table>');
    });
   search('');
});
    function search(name) {
    //nachfragen delay und Buchstabe zuwenig Problem
        console.log('search');
        remove();
        $('#ausgabe').html("");
       var x= jQuery('<tbody></tbody>');
        $.getJSON( "/json?tfsearch="+name, function(data) {
            $.each(data, function (index, user) {
                // var link = "<p>"+user.name +"</p>";
                $(x).append('<tr><td>' + user.name + '</td></tr>');
                $(x).appendTo('#tabelle');
                //  $(link).appendTo("#ausgabe");

            });

        });
    };

function search2(name) {
    //nachfragen delay und Buchstabe zuwenig Problem
    console.log('search');
    remove();
    $('#ausgabe').html("");
    var user;
    var x= jQuery('<tbody></tbody>');
    $.getJSON( "/json?tfsearch="+name, function(data) {
        $.each(data, function (index, user) {
            // var link = "<p>"+user.name +"</p>";
            if ( user!=user.name){
            user = user.name;
            $(x).append('<tr><td>' + user.name + '</td></tr>');
            };


            $(x).appendTo('#tabelle');
            //  $(link).appendTo("#ausgabe");

        });

    });
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

