$(document).ready(function(){

   

    // SLIDER ASPIRANT MANGAKA

    $( ".aspirant-item" ).mouseover(function() {
        $( ".aspirant-opacity-div2" ).show();
      });
      $( ".aspirant-item" ).mouseleave(function() {
        $( ".aspirant-opacity-div2" ).hide();
      })

    // SLIDER LES Nouveaux

    $( ".nouveau-item" ).mouseover(function() {
        $( ".nouveau-opacity-div2" ).show();
      });
      $( ".nouveau-item" ).mouseleave(function() {
        $( ".nouveau-opacity-div2" ).hide();
      })

})