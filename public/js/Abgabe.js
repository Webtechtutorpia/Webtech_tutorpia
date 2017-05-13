

    function search(name) {


    //nachfragen delay und Buchstabe zuwenig Problem
        console.log(name);
        $('#ausgabe').html("");
        $.getJSON( "/json?tfsearch="+name, function(data) {
            $.each(data, function(index,user) {
                var link = "<p>"+user.name +"</p>";
                $(link).appendTo("#ausgabe");
            });
        })
    };



