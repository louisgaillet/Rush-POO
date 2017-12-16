<?php
//require('class/Register.php');
require('class/Form.php');
require('bdd.php'); 
include('header.php'); ?>

	<div class="container-fluid login">
	<?php if (isset($_SESSION['status'])) {
		echo "<div class='errors'> ".$_SESSION['status']."</div>";
		unset($_SESSION['status']);
	} ?>
	<?php
	$form = new Form($_POST);
	?>
	<form action="class/action/connect_user.php" method="post" class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12" id="form_login">
		<!-- Mettre du css +  <div> label + input </div> -->
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<label for="">Email</label>
			</div>
			<div class="col-md-6 col-xs-12">
				<?php
					echo $form->input('email');
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<label for="">Password</label>
			</div>
			<div class="col-md-6 col-xs-12">
				<?php
					echo $form->inputpwd('password');
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-xs-12">
				<label for="">Stay connected ?</label>
			</div>
			<div class="col-md-6 col-xs-12">
				<?php
					echo $form->checkbox('connected');
				?>
			</div>
		</div>

		<div class="row wrapper-submit text-center">
				<?php
					echo $form->submit();
				?>
		</div>
	</form>

		
	
<?php include('footer.php'); ?>

