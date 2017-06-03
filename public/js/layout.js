
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

$(function() {


    $('li').bind('click', function(){
        if(getCookie('cookieconsent_status')=="") {
            alert("Bitte bestätigen Sie erst unsere Cookies");
            return false;
        }
        else {
            return true;
        }
    });

});


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


function clicknavbar(){
    $(function () {
        $("ul li").hover(function () {
            $(this).addClass('active');
            $(this).parent().children('li').not(this).removeClass('active');
        });
    });
}
