// On window load
$(window).on('load', function () 
{
    AOS.init();
    feather.replace({width: '1em', height: '1em'});
});

$( document ).ready(function() {
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 100) {
            $("nav").addClass("solidNav");
        } else {
            $("nav").removeClass("solidNav");
        }
    });
});

