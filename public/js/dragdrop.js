$(document).ready(function () {
    console.log("hahahaha")

    $('.sortable').sortable({
    tolerance: 'pointer',

    update: function (event, ui) {

    $(this).children().each(function (index) {

    if ($(this).attr("data-numero-page") != index + 1) {

    $(this).attr("data-numero-page", (index + 1)).addClass('updated')

    }

    });
    
    var chapitre = $('.sortable').data("chapitre");
    var img_numeros = new Array();
    var img_ids = new Array();
    var id =   $('.select-chapitre').data('chapitre')
    var arcId =   $('#arc-select').val();
    var mangaId = $('.img-container').data('manga')

    var route = "/profil/ajoutPage/"+mangaId+"/"+arcId+"/"+id
    console.log(route);
    
    
    console.log($('.list-image'))
    
    
    $('.btn').click(function (e) {
    
    
    $('.list-image').each(function () {
        
    img_numeros.push($(this).data("numero-page"));
    img_ids.push($(this).data("id-page"));
    $(this).removeClass('updated');
    
    });
    
    
    $.ajax({
    url: route,
    method: "POST",
    data: {
    img_numeros: img_numeros,
    img_ids: img_ids
    },
    success: function (response) {
    
    window.location.href = route
    }
    })
    });
}
});
});   