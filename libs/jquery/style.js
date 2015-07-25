$(document).ready(function(){ 
    //alert("je test  jquery");
  $('.div_lod').hide();
   $('.boutan1').click(function(){
    $('.div_lod').fadeIn(10).delay(2000).fadeOut(5000);
   });
    $('.annuler').click(function(){
    $('.div_lod').fadeIn(0).delay(2000).fadeOut(3000);
   }); 
     $('.succe').hide();
     $('.boutan1').click(function(){
    $('.succe').fadeIn(10).delay(9000).fadeOut(4000);});

     $('.erreur').hide();
     $('.boutan1').click(function(){
    $('.erreur').fadeIn(10).delay(9000).fadeOut(4000);});

  });