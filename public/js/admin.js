/**
 * Created by DerGeraet on 6/8/2017.
 */


function Bodyhandler(element){
    var Bodyelement = $(element).parent().children('.panel-body');
    if($(Bodyelement).is(':visible')){
        $(Bodyelement).hide('slow','linear');
        //$(".panel-body").hide('slow','linear');
    }
    else {
        //$(".panel-body").show('slow','linear');
        console.log('öffnen');
        $(Bodyelement).show('slow','linear');
    }
}
