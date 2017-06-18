// Funktion zum abfragne von Cookies
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
// Funktion zum setzten von Cookies
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
// Nach Seitenaufruf wird ein Clickevent an die Footer und Reiter angehängt und das akzeptieren von Cookies überprüft
$(function() {
    $('li').bind('click', function(){
        if(getCookie('cookieconsent_status')=="") {
           var akz = confirm("Bitte akzeptieren Sie erst unsere Cookies. Cookies erlauben?");
           if (akz==true){
               setCookie('cookieconsent_status', 'dismiss', 30 );
               return true;
           }
            return false;
        }
        else {
            return true;
        }
    });
    $('hoverselect').on('mouseover',hoverselectednavbar());
});

// Verändert die Navbar Reiter falls man mit der Maus drüber fährt
function hoverselectednavbar(){
    $(function() {
        $("li").hover(function() {
            // remove classes from all
            $("li").removeClass('active');
            // add class to the one we clicked
            $(this).addClass('active');
        },function(){
            $(this).removeClass('active');
        });

    });
}

//Öffnet und Schließt den Panel beim klicken
function panel_behavior(element){
    var Bodyelement = $(element).parent().children('.panel-body');
    if($(Bodyelement).is(':visible')){
        $(Bodyelement).hide('slow','linear');
    }
    else {
        console.log('öffnen');
        $(Bodyelement).show('slow','linear');
    }
}