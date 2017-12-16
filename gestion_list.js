		$('.message').hide();
		$('#search').hide();
		$('.tags').hide();

		function validateEmail(email) {
		    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(email);
		}

		function getTags(thisObj)
		{
			var tags = [];
			if(thisObj)
			{
				$(thisObj).find('.tags .active').each(function(){
					tags.push($(this).text());
				});
			}
			{
				$('form .tags .active').each(function(){
					tags.push($(this).text());
				});
			}

			return tags;
		}

		$('#choose_type').change(function(){
			var value = $('#choose_type').val();
			if(value == 'todo')
			{
				$('.tags').show();
			}
			else{
				$('.tags').hide();
			}
		});

		$('#submit').click(function(e){
			e.preventDefault();

			var categories = getTags();
			var categoriesList ="";
			for (var i = 0 ; i <= categories.length-1; i++) {
				var categoriesList = categoriesList +'<span class="active '+categories[i]+'">'+categories[i]+'</span>';
			}
			var type = $('#choose_type').val();
			var value = $("#submitText").val();
			var content = '<li class='+type+'>'+value+'<button class="edit"> Edit </button> <div class="tags"> '+categoriesList+'</div></li>'

			if(type != "" && value !="")
			{	
				if(type == "note")
				{
					$('ul').append(content);
				}
				if(type == "email")
				{
					if(validateEmail(value))
					{
						$('ul').append(content);
					}
					else
					{
						$('.message').show(400);
						$('#submitText').val('');
					}

				}
				if(type == "todo")
				{
					$('ul').append(content);
				}

				$('#submitText').val('');
				$('#search').show(400);

			}
			else
			{
				$('.message').show(400);
			}
		});

		$('#submit_search').click(function(e){
			e.preventDefault();
			var type = $('#search_type').val();
			$('li').addClass('hidden');

			$( "li" ).each(function( index ) {
				var text = $(this).text();
				if(text.indexOf(type) != -1){
				   $(this).removeClass('hidden');
				   $(this).addClass('visible');
				}
				else if($(this).hasClass(type))
				 {
				 	$(this).removeClass('hidden');
				 	$(this).addClass('visible');
				 }
			});
		})

		$('.tags span').on('click', function(){
			$(this).toggleClass('active');
		});
