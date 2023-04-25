window.$ = window.jQuery = require('jquery');
require('popper.js');
require('bootstrap');
window.slick = require('slick-carousel');

$(document).ready( function() {
    $('#impressionen-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="carousel-control-prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></button>',
        nextArrow: '<button type="button" class="carousel-control-next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></button>',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});