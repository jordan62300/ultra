$(document).ready(function(){
    $('.header-slider').owlCarousel({
        margin:0,
        items:1,
        loop:true,
        dots: false,
        nav:false,
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