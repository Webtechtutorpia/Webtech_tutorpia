
$(function(){

        window.setInterval(function(){
            ajax();
        }, 1000);

});

function ajax(){

    $.ajax({ url: "/aktualisieren", success: function(result){
        var durchlauf;

        $.each(result ,function(index,actifity){
            switch(actifity.zustand){
                case '.':
                    durchlauf+= '<tr><td><p>' + actifity.abgabeupdated_at+'</p></td>';

                    var text=  "<p>"+ actifity.erstellt_von + " hat " +actifity.aufgabenname + " mit Abgabe am "+actifity.abgabedatum + " im Kurs " + actifity.kurs + " erstellt. </p>";
                    durchlauf +='<td>' +text +'</td></tr>';
                    break;
                case '-':
                case '+':
                    durchlauf+= '<tr><td>' + actifity.abgabeupdated_at+'</td>';
                    var text= "<p>"+ actifity.bearbeitet_von + " hat deine "+ actifity.aufgabenname + " im Kurs " + actifity.kurs + " geändert. </p>";
                    durchlauf +='<td>' +text +'</td></tr>';
                    break;
            }


        });
        $('tbody').html(durchlauf);
$('td').addClass("col-md-4 col-xs-8");
    }});

}