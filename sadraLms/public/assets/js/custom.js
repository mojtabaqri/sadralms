
(function($) {
    "use strict";

    $(document).ready(function () {

        /*---------------------------------------------------
            slider carousel
        ----------------------------------------------------*/
        $('.slider').owlCarousel({
            loop: true,
            navText: ['<i class="icofont-simple-left"></i>', '<i class="icofont-simple-right"></i>'],
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });

        /*---------------------------------------------------
            testimonial carousel
        ----------------------------------------------------*/
        $('.testi-carousel').owlCarousel({
            loop: true,
            navText: ['<i class="icofont-simple-left"></i>', '<i class="icofont-simple-right"></i>'],
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });

        /*---------------------------------------------------
                magnific popUp
        ----------------------------------------------------*/
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            disableOn: 300
        });

        /*---------------------------------------------------
            scrollIt plugin activation
        ----------------------------------------------------*/


    });

    /*---------------------------------------------------
        sticky header
    ----------------------------------------------------*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $("#header").removeClass("sticky");
        } else {
            $("#header").addClass("sticky");
        }
    });

    /*---------------------------------------------------
        accordian
    ----------------------------------------------------*/
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        $(this).prev().removeClass('active');
    });

    /*---------------------------------------------------
        preloader
    ----------------------------------------------------*/
    $(window).on('load', function() {
        $('.preloader').fadeOut(500);
    });


}(jQuery));
