<?php
require('class/Manage.php');
require('class/Form.php');
require('class/Product.php');
require('class/ViewManage.php');
require('bdd.php'); 
include('header.php');
if ($is_admin == true){

	$manage = new Manage($bdd);
	$data = $manage->showAllUsers();
	$view = new ViewManage($data);
?>
<div class="manage-page">
	<div class="container">

	<?php if (isset($_SESSION['status'])) {
		echo "<div class='errors'> ".$_SESSION['status']."</div>";
		unset($_SESSION['status']);
	} ?>
	
		<div class="row">
			<div class=" col-md-6 col-xs-12 users_list">
				<div class="module_admin_list flex-row">
					<div class="header_item">
						<h3 class="white"> Upadate & delete</h3>
					</div>
					<div class="module_content" id="product_list">
					<?php  $view->GetAllUsers();?>
				 	</div>
				</div>
			</div>


			<div class="col-md-6 col-xs-12">
				<div class="module_admin flex-row">
					<div class="header_item">
						<h3 class="white"> Add user </h3>
					</div>
					<div class="module_content">
						<?php
							$form = new Form($_POST);
							?>
							<form action="class/action/add_user.php" method="post" id="form_add_user_admin">
								<div id="wrapper_name " class="row">
									<label for="" class="col-md-6 col-xs-12"> Username</label>
									<?php
										echo $form->input('username');
									?>
								</div>

								<div id="wrapper_email" class="row">
									<label for="" class="col-md-6 col-xs-12"> Email</label>
									<?php
										echo $form->input('email');
									?>
								</div>

								<div id="wrapper_password" class="row">
									<label for="" class="col-md-6 col-xs-12">Password</label>
									<?php
										echo $form->inputpwd('password');
									?>
								</div>

								<div id="wrapper_password_verify" class="row">
									<label for="" class="col-md-6 col-xs-12">Password verify</label>
									<?php
										echo $form->inputpwd('password_verify');
									?>
								</div>

								<div class="row">
									<label for="is_admin" class="col-md-6 col-xs-12"> Administrateur</label>
									<?php echo $form->checkbox('is_admin'); ?>
								</div>
								
								<div id="wrapper-submit" class="row">
									<?php
										echo $form->submit(); ?>
								</div>
							</form>
						</div>
				</div>
			</div>

		</div> <!-- ./Row -->
	</div> <!-- ./Container -->
</div> <!-- ./Manage -->
	

<?php }else{
	header("Location: ./index.php");
	exit;
} ?>
<?php include('footer.php'); ?>