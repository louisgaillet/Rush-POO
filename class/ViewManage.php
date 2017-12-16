<?php 
require_once('Atemplate.php');

	class ViewManage extends Atemplate
	{

		public function GetAllUsers()
		{
			$list = '';
			foreach ($this->data as $value) 
			{
				$list .= "
				<li class='item_user ' data-id=".$value['id'].">
					<div class=' d-flex flex-row justify-content-between align-items-center'>
						<p>". $value['username']."</p>
						<div class='wrapper_buttons'>
						    <button type='button' class='btn btn-default btn-sm btn btn-danger remove_user'>
		          				<span class='glyphicon glyphicon-remove'></span> Remove 
		        			</button>
		        			<button type='button' class='btn btn-default btn-sm edit btn-info'>
		          				<span class='glyphicon  glyphicon-edit'></span> Edit 
		        			</button>
	        			</div>
        			</div>
        			<form class='edit_user no-visible' action='class/action/update_user.php' method='post'>
        				<div class='row'>
        					<label for='username' class='col-md-6 col-xs-12'>username</label>
        					<div class='col-md-6 col-xs-12'>
        					<input type = 'text'  id='username' name='username' value = ".$value['username']." >
        					</div>
        				</div>
        				<div class='row'>
        					<label for='email' class='col-md-6 col-xs-12'>Email</label>
        					<div class='col-md-6 col-xs-12'>
        					<input type = 'email'  id='email' name='email' value = ".$value['email']." >
        					</div>
        				</div>
        				<div class='row'>
        					<label for='password' class='col-md-6 col-xs-12'>Password</label>
        					<div class='col-md-6 col-xs-12'>
        					<input type = 'password' id='password' name='password' value ='' placeholder='password' >
        					</div>
        				</div>
        				<div class='row'>
        					<label for='password' class='col-md-6 col-xs-12'>Password confirmation</label>
        					<div class='col-md-6 col-xs-12'>
        					<input type = 'password' id='password_confirmation' name='password_confirmation' value ='' placeholder='password' >
        					</div>
        				</div>
        				<div class='row text-center'>
        					<span class='submit btn btn-success'>Update</span>
        				</div>
        			</form>
				</li>" ;
			}
				echo "<ul class='list-group'>".$list."</ul>";
		}
	}

?>