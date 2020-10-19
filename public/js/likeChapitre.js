$(document).ready(function () {
    var isLiked = $(".like").data("like")
    var isShared = $(".share").data("share")  
    var isCommentShared = document.getElementsByClassName('shareCom')
    var isCommentLiked = document.getElementsByClassName('likeCom')
    
    defineColorAtStart();

   
    $( ".like" ).click(function() {
        changeLikeChapitreColor()
    })

    $( ".share" ).click(function() {
        changeShareChapitreColor()
    })
    $( ".likeCom" ).click(function(e) {
        ChangeCommentLikeColor(e)
    })
    $( ".shareCom" ).click(function(e) {
        ChangeCommentShareColor(e)
    })

    function defineColorAtStart() {
        if(isLiked == '1') {
            $(".like").css("color", "rgb(217, 4, 160)")
        }
        if(isShared == '1') {
            $(".share").css("color", "rgb(217, 4, 160)")
        }
    
        for (let index = 0; index < isCommentShared.length; index++) {
            const element = isCommentShared[index];
            
            if(element.dataset.share == '1') {
                $(element).css("color", "rgb(217, 4, 160)")
            }
            
        }
    
        for (let index = 0; index < isCommentLiked.length; index++) {
            const element = isCommentLiked[index];
            
            if(element.dataset.like == '1') {
                $(element).css("color", "rgb(217, 4, 160)")
            }
            
        }
    }

    function changeLikeChapitreColor() {
        
        
        if(isLiked == '' || isLiked == 'false' || isLiked == '0') {
              $(".like").css("color", "rgb(217, 4, 160)");
              $(".like").data("like" ,'true')
              $(".like").attr("data-like" , "true")
              isLiked = $(".like").data("like")
             
        } else if( isLiked == 'true' || isLiked == '1') {
            $(".like").css("color", "rgb(255, 255, 255)")
            $(".like").attr("data-like" , "false")
            $(".like").data("like" ,'false')
            isLiked = $(".like").data("like")
        }

        $.post(url.pathname, {
            isLiked : isLiked 
             
         },
         
         function(data, status) {
            
         })

    }

    function changeShareChapitreColor() {
        if(isShared == '' || isShared == 'false' || isShared == '0') {
              $(".share").css("color", "rgb(217, 4, 160)");
              $(".share").data("share" ,'true')
              $(".share").attr("data-share" , "true")
              isShared = $(".share").data("share")
             
        } else if( isShared == 'true' || isShared == '1') {
            $(".share").css("color", "rgb(255, 255, 255)")
            $(".share").attr("data-share" , "false")
            $(".share").data("share" ,'false')
            isShared = $(".share").data("share")
        }

        $.post(url.pathname, {
            isShared : isShared 
             
         },
         
         function(data, status) {
            
         })

        }
    function ChangeCommentLikeColor(e) {
      
        var commentaireId = e.currentTarget.dataset.commentaire
       
        var Liked = e.currentTarget.dataset.like
        
        if(Liked == '' || Liked == 'false' || Liked == '0') {
          //  $(".likeCom").css('color','rgb(217, 4, 160)')
            $(e.target).css("color", "rgb(217, 4, 160)");
            e.currentTarget.dataset.like = 'true'
            e.currentTarget.dataset.like = 'true'
            Liked = e.currentTarget.dataset.like
           
      } else if( Liked == 'true' || Liked == '1') {
        $( e.target ).css("color", "rgb(255, 255, 255)")
          e.currentTarget.dataset.like = 'false'
            e.currentTarget.dataset.like = 'false'
          Liked = e.currentTarget.dataset.like
      }

      $.post(url.pathname, {
        commentaireId : commentaireId ,
        Liked : Liked
           
       },
       
       function(data, status,e) {
        var newhtml = $(data).find('.commentaire-list').html()
          $(".commentaire-list").html(newhtml);
          defineColorAtStart();
       })
    }

    function ChangeCommentShareColor(e) {
        
          var commentaireId = e.currentTarget.dataset.commentaire
          
          var shared = e.currentTarget.dataset.share
          
          if(shared == '' || shared == 'false' || shared == '0') {
              $(e.target).css("color", "rgb(217, 4, 160)");
              e.currentTarget.dataset.share = 'true'
              e.currentTarget.dataset.share = 'true'
              shared = e.currentTarget.dataset.share
             
        } else if( shared == 'true' || shared == '1') {
              $( e.target ).css("color", "rgb(255, 255, 255)")
              e.currentTarget.dataset.share = 'false'
              e.currentTarget.dataset.share = 'false'
              shared = e.currentTarget.dataset.share
        }
  
        $.post(url.pathname, {
          commentaireId : commentaireId ,
          shared : shared
             
         },
         
         function(data, status) {
          
         })
      }

})