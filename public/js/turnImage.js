var numeroPage = $(".page-container").data('page')
var chapitre = $(".page-container").data('chapitre')
const url = new URL(window.location.href); 
var showComment = false         
//const params = new URLSearchParams(url.search);                
//const mangaId = params.get('mangaId');                   
// const tomeId = params.get('tomeId');    

console.log(url)

$('.commentaire-section').hide()
if(numeroPage == '1')  {
$('.btn-remove').hide();
}




$(document).ready(function () {

    // Page suivante du lecteur de manga
     
    $(document).on('click','.btn-next',function (e) {
        e.preventDefault()
        numeroPage = numeroPage + 1; 

        // Affiche le boutton precedent
        if(numeroPage > '1')  {
            $('.btn-remove').show();
           
        }
        
         $.post(url.pathname, {
            numeroPage : numeroPage 
             
         },
         
         function(data, status) {
             var newSrc = $(data).find('.page').attr('src')
             var previousSrc =  $('.page').attr('src')

             // Si nous somme a la derniere page supprime le boutton suivant et affiche les commentaires
             if(newSrc == undefined ) {
                $('.btn-next').hide();
                showComment = true;
                $('.page-reader').hide()
                $('.commentaire-section').show()
             }
            
            $('.page').attr('src' , newSrc)
             
      //      $('html').html(data)
            })
        
    })

    // Page precedente du lecteur de manga

    $(document).on('click','.btn-remove',function (e) {
        e.preventDefault()
        console.log(url.pathname)
        numeroPage = numeroPage  - 1; 
        if(numeroPage <= '1')  {
            $('.btn-remove').hide();
            
        } 
        if(showComment == true){
            $('.btn-next').show();
            showComment == false
            $('.page-reader').show()
                $('.commentaire-section').hide()
        }
        
         $.post(url.pathname, {
            numeroPage : numeroPage 
             
         },
         
         function(data, status) {
    
            
            var body = $(data).find('body').html()
              var src = $(data).find('.page').attr('src')
         $('.page').attr('src' , src)
            $('body').html(body);
      //      window.location = "/lecture/"+chapitre+"/"+numeroPage
      //      $('html').html(data)
            })
        
    })

    /*

    $(document).on('change','#chapitre-select',function (e) {
      var id =   $('#chapitre-select').val();
        console.log(id)
        $.post("index.php?content=read&mangaId="+mangaId+"&tomeId="+id, {
            tomeSelectedId : id 
            
        },
        function(data, status) {
            $('html').html(data)
            
            console.log(id)
            window.location = "index.php?content=read&mangaId="+mangaId+"&tomeId="+id
        })
        
    })

   */
     
      

})
