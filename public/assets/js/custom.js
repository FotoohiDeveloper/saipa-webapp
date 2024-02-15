
$("#preloader").scrollTop(500).delay(1);

$(window).scroll(function () {
    var navbar = $("#navbar");
    $(this).scrollTop() > 20
        ? navbar.addClass("header-scrolled")
        : navbar.removeClass("header-scrolled");
});

$(".owl-testimonials-slider").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    responsiveClass: true,
    responsive: {
        0: { items: 1 },
        600: { items: 1 },
        1000: { items: 1 },
    },
});

