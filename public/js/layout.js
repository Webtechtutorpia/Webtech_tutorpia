
function hoverselectednavbar(){

    $(function() {
        $("li").hover(function() {
            // remove classes from all
            $("li").removeClass("active");
            // add class to the one we clicked
            $(this).addClass("active");
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
