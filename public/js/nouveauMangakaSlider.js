$(document).ready(function () {
    var owl = $('.list-test2');
    owl.owlCarousel({
      //When page load (i think) call function 'inlargItem'
      
      items:5,
      autoWidth: true,
      center:false,
      margin: 10,
      nav: true,
      navSpeed: 700,
      slideBy: 6,
      loop: true,
      dots: true,
      navText : ["<span class='opacity-div2 nouveau-opacity-div2'><i class='fa fa-chevron-left slider3'></i></span>","<span class='opacity-div1'><i class='fa fa-chevron-right slider3'></i></span>"],
      navClass:["owl-prev3" , "owl-next3"],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
    $('.owl-stage').addClass('wraper')
  })

  //Calls inlargItem on every change
  $('.owl-carousel').on('changed.owl.carousel', function (event) {
    inlargItem(event)
  })

  //For key movement
  $(document.documentElement).keyup(function (event) {
    if (event.keyCode == 37) {
      /*left key*/
      $('.owl-carousel').trigger('prev.owl.carousel', [700]);
    } else if (event.keyCode == 39) {
      /*right key*/
      $('.owl-carousel').trigger('next.owl.carousel', [700]);
    }
  });

  //Select the forth element and add the class 'big' to it 
  function inlargItem(event) {
    //Find all 'active' class and dvide them by two 
    //5 (on larg screens) avtive classes / 2 = 2.5 
    //Math.ceil(2.5) = 3
    var activeClassDividedByTwo = Math.ceil($(".active").length / 2)
    //Adding the activeClassDividedByTwo (is 3 on larg screens)
    let OwlNumber = event.item.index + activeClassDividedByTwo
    //Rmove any 'big' class 
    $(".item").removeClass("big")
    //Adding new 'big' class to the fourth .item
    $(".item").eq(OwlNumber).addClass("big")
  }