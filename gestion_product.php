<?php
require('class/Manage.php');
require('class/Product.php');
require('class/Formulaire.php');
require('class/Categories.php');
require('class/ViewProduct.php'); 
require('bdd.php'); 
include('header.php');
if ($_COOKIE['admin'] == 1){
?>

<?php 
	$manage = new Manage($bdd);
?>
<div class="manage-page">
<div class="container">

	<div class="row d-flex flex-row justify-content-between">

	<div class="col-md-6 col-xs-12">
		<div class="module_admin flex-row">
			<div class="header_item">
				<h3 class="white"> Add & update </h3>
			</div>
			<div class="module_content">
				<?php include('include/form_product.php') ?>
			</div>
		</div>	
	</div>

	<div class="col-md-6 products_list">
		<div class="module_admin_list flex-row">
			<div class="header_item">
				<h3 class="white"> Upadate & delete</h3>
			</div>
			<div class="module_content" id="product_list">
			<?php 
				$product = new Product($bdd);
				$data =  $product->showProduct();
				$view = new ViewProduct($data);
				$view->getViewAdmin();
			 ?>
			 </div>
		</div>
	</div>

			</div> <!-- ./Row -->
</div> <!-- ./Container -->
</div>
	

<?php } // End admin verif ?>
<?php include('footer.php'); ?>