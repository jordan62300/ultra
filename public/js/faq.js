$(document).ready(function () {

    console.log("helo")
    var isClicked = false ;
    var message = "Jadore la thune wola"
    $(document).on('click','.croix',function (e) {
        if(isClicked) {
            $(this).css("transform","rotate(45deg)");
            console.log( $(this).parent().next( ".answer" ))
            $(this).parent().next( ".answer" ).remove()
            isClicked = false
        } else {
            console.log($(this).parent())
            $(this).css("transform","rotate(0deg)");
          //  $(".anwser").remove()
              answer(message,this);
            isClicked = true
        }
    })

    function answer(mess,e) {
        var oui = $(`<p class="content"> ${mess} </p>`).hide()
        $(e).parent().after( `<div class="item-faq-container answer"></div> ` );
        $('.answer').append(oui)
        oui.fadeIn('slow')
    }

})
