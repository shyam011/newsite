$(document).ready(function(e) {
   $('.carousel').carousel({dist:-60,shift:0,padding:15});
   $('.slider').slider({height:180});
   $(".button-collapse").sideNav();
   $('select').material_select();
   $('ul.tabs').tabs();
   $(".dropdown-button").dropdown();
   $('.parallax').parallax();
   $('.modal').modal();
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
  
  
  $('input.autocomplete').autocomplete({
    data: {
      "Videos": 'https://placehold.it/250x250',
      "Images": 'https://placehold.it/250x250',
      "Jockes": 'https://placehold.it/250x250',
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
  
  
  
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
	$(".social a.likes, .social a.download, .social a.share").click(function(){
	  $(this).addClass("active");	
	});


	//## 
		$('#dologin').click(function(){
			$.ajax({
				url:'ajax.user.php',
				type:'post',
				data:{mode:'dologin',email:$('#login_user').val(),password:$('#login_pass').val()},
				success:function(result){
					var fresh = JSON.parse(result);
					if(fresh.success == true){
						window.location.reload();
					}else{
						alert(fresh.msg);
					}
				}
			});
		});
	//## 
});
