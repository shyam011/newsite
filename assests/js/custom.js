$(document).ready(function(e) {
   $('.carousel.carousel-slider').carousel({fullWidth: true}); 
   $('.carousel').carousel({height:200,dist:-50,shift:0});
   $('.slider').slider({height:180});
   $(".button-collapse").sideNav();
   $('ul.tabs').tabs();
   $(".dropdown-button").dropdown();
   $('.modal').modal();
});

$(window).scroll(function() {
      if ($(this).scrollTop() > 70){
      $('.catnav').addClass('sticky');
      }
      else{
      $('.catnav').removeClass('sticky');
      }
});


$(document).ready(function(e) {
    $(".followbtn a").click(function(){
	  $(this).toggleClass("following").text("Following")	
	});
});
