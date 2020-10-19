$(document).ready(function(){

    console.log("hhh")
    $('.center').slick({
        centerMode: true,
        centerPadding: '200px',
        prevArrow: '<i class="prev fa fa-chevron-left">',
        nextArrow: '<i class="next fa fa-chevron-right">',
        slidesToShow: 1,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });
  });

