$(document).ready(function () {
    const url = new URL(window.location.href); 

    // Affiche le preview lors d'un click sur un manga du catalogue 
     
    $(document).on('click','.catalogue-item-container',function (e) {


        var nom = e.currentTarget.dataset.nom
        var description = e.currentTarget.dataset.description
        var vitrineune = e.currentTarget.dataset.vitrineune
        var auteur = e.currentTarget.dataset.author
        console.log(e)
        var soutien = e.currentTarget.dataset.soutien
        var palier = e.currentTarget.dataset.palier
        

        console.log("soutien : " + soutien)
        console.log("palier : " + palier)

        var soutienpercent = soutien*100/palier

        console.log("% : " + soutienpercent)



        var id = $(this).attr('id');
        console.log(url)

        
      
        if($(this).attr('class') == 'catalogue-item-container row') {

        console.log(e.currentTarget.className)
        var teste = e.currentTarget
        $(".newdiv").remove()
        $(teste).after( `<div id="newDiv" class="newdiv"></div> ` );
        window.location.hash = 'newDiv'
        $('.newdiv').css('left','-125px')
        $('.newdiv').append('<i class="fas fa-times croix"></i>')
        $('.newdiv').append(`<div class="preview-slider"></div>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)

        $('.newdiv').append(`<div class="preview-info"></div>`)
        $('.preview-info').append(`<p class="nom"> ${nom} </p>`)
        $('.preview-info').append(`<p class="auteur"> Créateur ${auteur} </p>`)
        $('.preview-info').append(`<p class="genre">  genres : <span> action / aventure / seinen </span> </p>`)
        $('.preview-info').append(`<p class="description"> ${description} </p>`)

        $('.preview-info').append(`<div class="btn-tool-container"></div>`)
        $('.btn-tool-container').append(`<a href="#"> <img class="play" src="assets/imagesStatic/play.png" /> Lecture </a>`)
        $('.btn-tool-container').append(`<a href="#"> Chapitres </a>`)
        $('.btn-tool-container').append(`<a href="#"> Plus d'info </a>`)
        $('.btn-tool-container').append(`<a href="#"> like </a>`)
       
        $('.newdiv').append(`<div class="soutien-container"></div>`)
        $('.soutien-container').append(`<div class="soutien-barre"></div>`)
        $('.soutien-barre').append(`<p class="soutien-number"> ${soutien}/${palier}</p>`)

        $('.soutien-barre').append(`<div class="soutien-barre-pink"></div>`)
        var barre = $(".soutien-barre-pink")
        console.log(barre)
        barre[0].style.setProperty('--width', `${soutienpercent}%`);

        $('.soutien-container').append(`<a href="#"> Participer </a>`)

        $('.soutien-barre-pink').css("width",`${soutienpercent}%`)
        } else {
        var row = $(this).nextAll( ".row" )
        row = row[0]
        $(".newdiv").remove()
        $(row).after( `<div id="newDiv" class="newdiv"></div> ` );
        $('.newdiv').css('left','-125px')
        $('.newdiv').append('<i class="fas fa-times croix"></i>')
        $('.newdiv').append(`<div class="preview-slider"></div>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)

        $('.newdiv').append(`<div class="preview-info"></div>`)
        $('.preview-info').append(`<p class="nom"> ${nom} </p>`)
        $('.preview-info').append(`<p class="auteur"> ${auteur} </p>`)
        $('.preview-info').append(`<p class="genre">  genres :  action / aventure / seinen </p>`)
        $('.preview-info').append(`<p class="description"> ${description} </p>`)

        $('.preview-info').append(`<div class="btn-tool-container"></div>`)
        $('.btn-tool-container').append(`<a href="#"> Lecture </a>`)
        $('.btn-tool-container').append(`<a href="#"> Chapitres </a>`)
        $('.btn-tool-container').append(`<a href="#"> Plus d'info </a>`)
        $('.btn-tool-container').append(`<img class="like" src="assets/imagesStatic/like.png">`)
       
        $('.newdiv').append(`<div class="soutien-container"></div>`)
        $('.soutien-container').append(`<div class="soutien-barre"></div>`)
        $('.soutien-barre').append(`<p class="soutien-number"> ${soutien}/${palier}</p>`)

        $('.soutien-barre').append(`<div class="soutien-barre-pink"></div>`)
        var barre = $(".soutien-barre-pink")
        console.log(barre)
        barre[0].style.setProperty('--width', `${soutienpercent}%`);

        $('.soutien-container').append(`<a href="#"> Participer </a>`)

        $('.soutien-barre-pink').css("width",`${soutienpercent}%`)
        }
       // $(this).closest('.row').next().find('.class');
    })

    // Clique sur un manga slider 

    $(document).on('click','.item-slider-owl',function (e) {
        console.log(e)

        var nom = e.currentTarget.dataset.nom
        var description = e.currentTarget.dataset.description
        var vitrineune = e.currentTarget.dataset.vitrineune
        var auteur = e.currentTarget.dataset.author
        console.log(e)
        var soutien = e.currentTarget.dataset.soutien
        var palier = e.currentTarget.dataset.palier
        

        console.log("soutien : " + soutien)
        console.log("palier : " + palier)

        var soutienpercent = soutien*100/palier

        console.log("% : " + soutienpercent)



        var id = $(this).attr('id');
        console.log(url)

        
      
        if($(this).attr('class') == 'item-slider-owl') {

        console.log(e.currentTarget.className)
        var teste = e.currentTarget
        $(".newdiv").remove()
        $('.first').append( `<div id="newDiv" class="newdiv"></div> ` );
        window.location.hash = 'newDiv'
      //  $('.newdiv').css('left','28.5px')
        $('.newdiv').append('<i class="fas fa-times croix"></i>')
        $('.newdiv').append(`<div class="preview-slider"></div>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)
        $('.preview-slider').append(`<img src=${vitrineune}>`)

        $('.newdiv').append(`<div class="preview-info"></div>`)
        $('.preview-info').append(`<p class="nom"> ${nom} </p>`)
        $('.preview-info').append(`<p class="auteur"> ${auteur} </p>`)
        $('.preview-info').append(`<p class="genre">  genres :  <span> action / aventure / seinen </span> </p>`)
        $('.preview-info').append(`<p class="description"> ${description} </p>`)

        $('.preview-info').append(`<div class="btn-tool-container"></div>`)
        $('.btn-tool-container').append(`<a href="#"> <img class="play" src="assets/imagesStatic/play.png" /> Lecture </a>`)
        $('.btn-tool-container').append(`<a href="#"> Chapitres </a>`)
        $('.btn-tool-container').append(`<a href="#"> Plus d'info </a>`)
        $('.btn-tool-container').append(`<img class="like" src="assets/imagesStatic/like.png">`)
       
        $('.newdiv').append(`<div class="soutien-container"></div>`)
        $('.soutien-container').append(`<div class="soutien-barre"></div>`)
        $('.soutien-barre').append(`<p class="soutien-number"> ${soutien}/${palier}</p>`)

        $('.soutien-barre').append(`<div class="soutien-barre-pink"></div>`)
        var barre = $(".soutien-barre-pink")
        console.log(barre)
        barre[0].style.setProperty('--width', `${soutienpercent}%`);

        $('.soutien-container').append(`<a href="#"> Participer </a>`)

        $('.soutien-barre-pink').css("width",`${soutienpercent}%`)
        } else {
        var row = $(this).nextAll( ".row" )
        row = row[0]
        }
       // $(this).closest('.row').next().find('.class');
    })


    // Ferme la preview lors d'un click sur la croix

    $(document).on('click','.croix',function () {
    
        $(".newdiv").remove()
    })



    function jordan() {
        console.log("jkjjj")
    }
})
   