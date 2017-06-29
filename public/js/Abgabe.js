$(document).ready(function () {
    //Ausführung bei Eingabe in das Textfeld
    $('#tfsearch').on('input change', function () {
        ajax($('#tfsearch').val());
    })

});

function ajax(name) {
    //nachfragen delay und Buchstabe zuwenig Problem
    $.ajax({
        url: "/json?tfsearch=" + name, success: function (result) {
            $('tbody').html("");
            // //gültiger Ajax
            $.each(result.users, function (index, user) {
                var row = $('<tr/>');
                $('tbody').append(row);
                $(row).append($('<td>' + user.name + '</td>'));

                $.each(result.abgaben, function (index, abgabe) {
                    if (abgabe.user == user.id && abgabe.user) {
                        // console.log(abgabe.zustand);
                        switch (abgabe.zustand) {
                            case '+':
                                var link = "/Korrektur/bestimmteAbgabe/" + abgabe.user + "/" + abgabe.aufgabenname;
                                $(row).append($('<td>', {class: "text-center"}).append($('<a>', {
                                    href: link,
                                    class: "glyphicon glyphicon-ok btn-success"
                                })));
                                break;
                            case '-':
                                var link = "/Korrektur/bestimmteAbgabe/" + abgabe.user + "/" + abgabe.aufgabenname;
                                $(row).append($('<td>', {class: "text-center"}).append($('<a>', {
                                    href: link,
                                    class: "glyphicon glyphicon-remove btn-danger"
                                })));
                                break;
                            case '/':
                                var link = "/Korrektur/bestimmteAbgabe/" + abgabe.user + "/" + abgabe.aufgabenname;
                                $(row).append($('<td>', {class: "text-center"}).append($('<a>', {
                                    href: link,
                                    class: "glyphicon glyphicon-minus btn-warning"
                                })));
                                break;
                            default:
                                $(row).append($('<td/>', {class: "text-center"}).text('unbearbeitet'));


                        }
                    }

                });


            });

        }
    });
}
