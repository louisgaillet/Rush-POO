<?php
require('class/Manage.php');
require('class/Product.php');
require('class/Formulaire.php');
require('class/Categories.php');
require('bdd.php'); 
include('header.php');
if ($_COOKIE['admin'] == 1){
?>

<?php 
	$manage = new Manage($bdd);
	$categories = new Categories($bdd);
	$categories->setCategories();
	$categories->getCategories();
	$categories=$categories->categories;
?>

<div class="container">

	<?php if (isset($_SESSION['status'])) {
		echo "<div class='errors'> ".$_SESSION['status']."</div>";
		unset($_SESSION['status']);
	} ?>
	<div class="row">

		<div class="col-md-4 col-sm-6 col-xs-12 wrapper">
			<div class="module_admin flex-row">
				<div class="header_item">
					<h3 class="white"> Add category</h3>
				</div>
				
				<div class="module_content">
					<?php
					$action="class/action/add_categorie.php";
					$form = new Formulaire('post',$action,'multipart/form-data');
						echo $form->input('name','Categorie name','name_categories');
						echo $form->inputSelect('parent_category','Parent categorie','category_product',$categories);
						echo $form->submit('Create', "add_categories");
						$form->close(); 
					 ?>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12 wrapper">
			<div class="module_admin flex-row">
				<div class="header_item">
					<h3 class="white"> Update category</h3>
				</div>

				<div class="module_content">
					<?php
					$action="class/action/update_categorie.php";
					$form = new Formulaire('post',$action,'multipart/form-data');
						echo $form->inputSelect('choose_category','Select categorie','category_product_update',$categories);
						echo $form->input('name','','name_categories');
						echo $form->inputSelect('parent_category','parent categorie','category_product',$categories);
						echo $form->submit('Update', "add_categories");
						$form->close(); 
					 ?>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12 wrapper">
			<div class="module_admin flex-row">
				<div class="header_item">
					<h3 class="white"> Remove category</h3>
				</div>

				<div class="module_content">
					<?php
						$action="class/action/remove_categorie.php";
						$form = new Formulaire('post',$action,'multipart/form-data');
							echo $form->inputSelect('choose_category','Select categorie','category_product_remove',$categories);
							echo $form->submit('Delete', "add_categories");
							$form->close(); 
					?>
				</div>
			</div>
		</div>


	</div> <!-- ./Row -->
</div> <!-- ./Container -->
	

<?php } // End admin verif ?>
<?php include('footer.php'); ?>