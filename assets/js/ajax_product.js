$(document).ready(function(){

		$(".remove_product").click(function(){

		var id = $(this).parents('li').data('id');

			$.ajax({
	        url: './class/action/remove_product.php',
	        type: 'POST',
	        data: {
	            id:  id
	        }
	    }).done(function(data){
	    	$('#product_list').html(data);
	            console.log(data);
	            $.getScript('http://localhost/rush_php/assets/js/ajax_product.js', function() {    
			    });
	    });
	});

    $( "#query_form form" ).on( "submit", function( event ) {
	  event.preventDefault();
	  var form =  $( "#query_form form" );
	  var data =  $( this ).serialize() ;
	   $.ajax({
        url: form.attr("action"),
        type: 'POST',
        data: {
           data: data
        }
    }).done(function(data){
    	$('#wrapper_products').html(data);

            $.getScript('http://localhost/rush_php/assets/js/script.js', function() {    
		    });       
     });
	});

	$( "#search_form form" ).on( "submit", function( event ) {
	  event.preventDefault();
	  var form =  $( "#search_form form" );
	  var data =  $( this ).serialize() ;
	   $.ajax({
        url: form.attr("action"),
        type: 'POST',
        data: {
           data: data
        }
    }).done(function(data){
    	$('#wrapper_products').html(data);

            $.getScript('http://localhost/rush_php/assets/js/script.js', function() {    
		    });       
     });
	});

});