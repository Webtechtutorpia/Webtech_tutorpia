
function hoverselectednavbar(){

    $(function() {
        $("li").hover(function() {
            // remove classes from all
            $("li").removeClass("active");
            // add class to the one we clicked
            $(this).addClass("active");
            // stop the page from jumping to the top
            return false;
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

function test() {

}