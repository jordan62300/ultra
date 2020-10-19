$(document).ready(function () {
    console.log("hdshd")
$('body').on('change','#arc-select',function (e) {

    var id =   $('.select-chapitre').data('chapitre')
    var arcId =   $('#arc-select').val();
    var mangaId = $('.img-container').data('manga')
    var route = $('.sortable').data('test')
    console.log(route);

    $.post("/profil/ajoutPage/"+mangaId+"/"+arcId+"/"+id, {
        id : id ,
        arcId:arcId
    },
    function(data, status) {
       var teste = $(data).find('#ajout_page_form_chapitre').html();

       
      $('#ajout_page_form_chapitre').html(teste)
       console.log(teste)
   //     $('html').html(data)  
    //    window.location = "/profil/ajoutPage/"+arcid+"/"+id
    })
            
            
})
})