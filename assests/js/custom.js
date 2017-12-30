$(document).ready(function(e) {
    $(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	$('.slider').slider({height: 200});
	$('.modal').modal();
});


$(document).ready(function(e) {
    $(".followbtn a").click(function(){
	  $(this).toggleClass("following").text("Following")	
	});
});

$(window).scroll(function() {
      if ($(this).scrollTop() > 25){
      $('nav').addClass('sticky');
      }
      else{
      $('nav').removeClass('sticky');
      }
});
 
	