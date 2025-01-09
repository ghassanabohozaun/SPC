// JavaScript Document
(function ($) {
    "use strict";

    //calling foundation js
    $(document).foundation();

    $('.single-sub').hover(
        function () {
            $(this).children('.submenu').fadeIn(400);
        },
        function () {
            $(this).children('.submenu').fadeOut(400);
        }
    );


    //calling Brand Crousel
    $(".main-banner-new").owlCarousel({
        rtl: true,
        loop: true,
        margin: 5,
        responsiveClass: true,
        autoplay: true,
        slideSpeed: 5000,
        nav: true,
        responsiveRefreshRate: 200,
        rewind: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            },
        }
    });

    //Our Partners Crousel
    $(".partners").owlCarousel({
        rtl: true,
        loop: true,
        responsiveClass: true,
        margin: 15,
        autoplay: true,
        smartSpeed: 3000,
        slideSpeed: 60,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                loop: true,
            },
            600: {
                items: 2,
                loop: true,
            },
            1000: {
                items: 3,
                loop: true,
            },

        }
    });

    //Testimonial Crousel
    $(".testimonial-slid").owlCarousel({
        loop: true,
        responsiveClass: true,
        margin: 10,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                loop: true
            },
            600: {
                items: 1,
                loop: true
            },
            1000: {
                items: 1,
                loop: true
            }
        }
    });

    //Offers Crousel
    $(".offer-slid").owlCarousel({
        rtl: true,
        loop: true,
        autoplay: false,
        nav:true,
        //smartSpeed:3000,
        //slideSpeed:60,
        autoplayTimeout: 2000,
        responsiveClass: true,
        margin: 15,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                loop: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            },
            600: {
                items: 2,
                loop: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            },
            1000: {
                items: 3,
                loop: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            }
        }
    });


    //Saying page loaded
    $(window).on("load", function () {
        $("body").addClass("loaded");
        $(".preloader").html("");
        $(".preloader").css("display", "none");
    });

    //Display Scroll Btn on 1000px
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 1000) {
            $("#top").fadeIn();
        } else {
            $("#top").fadeOut();
        }
    });

    //scroll effect
    $("#top").on("click", function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    //Moving Top
    $("#top").on("click", function (event) {
        event.stopPropagation();
        var idTo = $(this).attr("data-atr");
        var Position = $("[id='" + idTo + "']").offset();
        $("html, body").animate({scrollTop: Position}, "slow");
        return false;
    });


    //Fact Counter + Text Count
    if ($('.count-box').length) {
        $('.count-box').appear(function () {

            var $t = $(this),
                n = $t.find(".count-text").attr("data-stop"),
                r = parseInt($t.find(".count-text").attr("data-speed"), 10);

            if (!$t.hasClass("counted")) {
                $t.addClass("counted");
                $({
                    countNum: $t.find(".count-text").text()
                }).animate({
                    countNum: n
                }, {
                    duration: r,
                    easing: "linear",
                    step: function () {
                        $t.find(".count-text").text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $t.find(".count-text").text(this.countNum);
                    }
                });
            }

        }, {accY: 0});
    }


})(jQuery); //jQuery main function ends strict Mode on
