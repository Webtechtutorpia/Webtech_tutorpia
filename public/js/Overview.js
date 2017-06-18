// Sobald die Seite aufgerufen wurde wird der Reiter eingefärbt und in einem Intervall die function ajax aufgerufen
$(document ).ready(function() {
    $("li[name='Übersicht']").css('background-color', '#f5f8fa');
        window.setInterval(function(){
            ajax();
        }, 10000);
});

// Die Funktion ajax lädt die Daten aus der Datenbank und stellt alle Aktivitäten in einer Tabelle dar
function ajax(){
    console.log('ajax');
    $.ajax({ url: "/aktualisieren", success: function(result){
        var durchlauf;

        $.each(result,function(index,actifity){
            durchlauf+= '<tr><td>' + actifity.zeit+'</td>';
            switch(actifity.was){
                case 'aufgabe':
                    var text=  "<p>"+ actifity.erstellt_von + " hat " +actifity.aufgabenname + " mit Abgabe am "+actifity.abgabedatum + " im Kurs " + actifity.kurs + " erstellt. </p>";
                    durchlauf +='<td>' +text +'</td></tr>';
                    break;

                case 'abgabe':
                    var text= "<p>"+ actifity.bearbeitet_von + " hat deine "+ actifity.aufgabenname + " im Kurs " + actifity.kurs + " bewertet. </p>";
                    durchlauf +='<td>' +text +'</td></tr>';
                    break;
            }
        });
        $('tbody').html(durchlauf);
$('td').addClass("col-md-4 col-xs-8");
    }});

}