$(document).ready(function(){


	   $('.item_user  .edit').click(function(){
			$('.edit_user').addClass('no-visible');
			$(this).parents('.item_user').find('.edit_user').removeClass('no-visible');
		});
// Ajax remove user

	$(".remove_user").click(function(){

		var id = $(this).parents('li').data('id');
			$.ajax({
	        url: './class/action/remove_user.php',
	        type: 'POST',
	        data: {
	            id:  id
	        }
	    }).done(function(data){
	    	$('.users_list').html(data);
	            console.log(data);
	            $.getScript('http://localhost/rush_php/assets/js/script.js', function() {    
			    });
	    });
	});

// Ajax update user

$('.submit').click(function (){
    // validation code here
     var id = $(this).parents('li').data('id');
     var username = $(this).parents('li').find('#username').val();
     var email = $(this).parents('li').find('#email').val();
     

     if( !$(this).parents('li').find('#password').val() ) {
     	var password = "";
     	var password_confirmation = "";
     }
     else{
     	var password = $(this).parents('li').find('#password').val();
     	var password_confirmation = $(this).parents('li').find('#password_confirmation').val();
     }
     $.ajax({
	        url: './class/action/update_user.php',
	        type: 'POST',
	        data: {
	            id:  id,
	            username : username,
	            email :email,
	            password : password,
	            password_confirmation : password_confirmation
	        }
	    }).done(function(data){
	    	$('.users_list').html(data);
	            console.log(data);
	            $.getScript('http://localhost/rush_php/assets/js/script.js', function() {    
			    });
	    });


});








});
