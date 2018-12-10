$( document ).ready(function(){
    
    window.addEventListener("keypress", function(event){
        if (event.keyCode == 13){
            event.preventDefault();
        }
    }, false);
        
  $('.fixed-action-btn').openFAB();
  $('.fixed-action-btn').closeFAB();
  $('.collapsible').collapsible();
	$(".dropdown-button").dropdown({
    hover:true,
    belowOrigin: true,
    constrain_width: false,
    top2 : 8
  });
  $('.slider').slider({
    full_width: true,
    indicators: true
  });
	$('select').material_select();
  	$('#textarea1').trigger('autoresize');
  	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
	  });
  $('.button-collapse').sideNav({
  	menuWidth: 240
  });
  $('.modal').modal({
  		starting_top: '10%',
      	ending_top: '5%'
  	});
  $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
    //$('select').select2();
})

function alerta(mensaje){
    Materialize.toast(mensaje,5000);
}
function alerta2(mensaje,segundos){
    Materialize.toast(mensaje,segundos*1000);
}


(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=381274778901763&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));