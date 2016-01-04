$(document).ready(function($) {

    /***************** Preloader ******************/
$(window).load(function(){
    $('#preloader').fadeOut('slow',function(){$(this).remove();});
});

    /***************** Waypoints ******************/

    $('.wp1').waypoint(function() {
        $('.wp1').addClass('animated fadeInLeft');
    }, {
        offset: '75%'
    });
    $('.wp2').waypoint(function() {
        $('.wp2').addClass('animated fadeInDown');
        $('.wp3').addClass('animated fadeInLeft');
        $('.wp4').addClass('animated fadeInRight');
    }, {
        offset: '75%'
    });
    $('.wp5').waypoint(function() {
        $('.wp5').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp6a').waypoint(function() {
        $('.wp6a').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
     $('.wp6').waypoint(function() {
        $('.wp6').addClass('animated fadeInLeft');
    }, {
        offset: '75%'
    });
    $('.wp7').waypoint(function() {
        $('.wp7').addClass('animated fadeInRight');
    }, {
        offset: '75%'
    });
    $('.wp8').waypoint(function() {
        $('.wp8').addClass('animated fadeInLeft');
    }, {
        offset: '75%'
    });
    $('.wp9').waypoint(function() {
        $('.wp9').addClass('animated fadeInRight');
    }, {
        offset: '75%'
    });
    $('.wp10').waypoint(function() {
        $('.wp10').addClass('animated fadeInLeft');
    }, {
        offset: '75%'
    });
    $('.wp11').waypoint(function() {
        $('.wp11').addClass('animated fadeInRight');
    }, {
        offset: '75%'
    });
    
    /***************** Fancybox ******************/

    $("a.fancybox").fancybox({
        padding: 4,
        helpers : {
        overlay : {
            css : {'background' : 'rgba(0, 0, 0, 0.9)'},
            locked: false
        }
    }    
    });
;

    /***************** Nav Transformicon ******************/

    /* When user clicks the Icon */
    $(".nav-toggle").click(function() {
        $(this).toggleClass("active");
        $(".navigation").toggleClass("open");
        event.preventDefault();
    });

    /* When user clicks a link */
    $(".overlay ul li a").click(function() {
        $(".nav-toggle").toggleClass("active");
        $(".navigation").toggleClass("open");
    });

    /* When user clicks outside */
    $(".overlay").click(function() {
        $(".nav-toggle").toggleClass("active");
        $(".navigation").toggleClass("open");
    });


    /***************** Header BG Scroll ******************/

    $(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 20) {
                $(".fixed-header").addClass("hasBg header-sml");
            } else {
                $(".fixed-header").removeClass("hasBg header-sml");
            }
        });
    });

    /***************** Smooth Scrolling ******************/

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 2000);
                return false;
            }
        }
    });

    /***************** To-Top Button ******************/

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

});