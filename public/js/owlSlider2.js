$(document).ready(function(){
$('.mangas-competition-listitems').owlCarousel({
    margin:0,
    items:5,
    lazyLoad: false,
    nav:true,
    slideBy: 4,
    navText : ["<i class='fa fa-chevron-left slider2'></i>","<i class='fa fa-chevron-right slider2'></i>"],
    navClass:["owl-prev2" , "owl-next2"],
    /*
  responsive:{
        0:{
            items:1,
            stagePadding: 100
        },
        600:{
            items:1,
            stagePadding: 100
        },
        1000:{
            items:1,
            stagePadding: 200
        },
        1200:{
            items:1,
            stagePadding: 250
        },
        1400:{
            items:1,
            stagePadding: 300
        },
        1600:{
            items:1,
            stagePadding: 350
        },
        1800:{
            items:1,
            stagePadding: 400
        }
    }
    */
})
})