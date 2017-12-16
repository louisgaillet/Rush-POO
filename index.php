<?php 
include('header.php'); 
require_once('class/Product.php');
require_once('class/Categories.php');
require_once('class/Formulaire.php');
require('class/ViewProduct.php');
?>

<?php if ($is_connected == true) {
	$product = new product ($bdd);
	$data = $product->showProduct();
	$view = new ViewProduct($data);
?>
	<div class="header">
		<div class="content">
			<img src="assets/img/logo.jpg" alt="logo">
		</div>
	</div>

	<div class="container">
		<div id='query_product'>
			<div class='col-md-3 ' id="search_form">
				<form action="class/action/search_product.php">
					<div class="form-group row"><input type="search" value="search" name="search" class="form-control"></div>
					<div class="row form-group text-center"> <input type="submit" class="form-control-file btn btn-info" id="search" value="Search"></div>
				</form>
			</div>
				<div id='query_form' class='col-md-9'>
					<?php include('include/filter.php');  ?>
				</div>

			</form>
		</div>
	</div>

	<div class="container" id="wrapper_products">
		<?php $view->getViewUser();?>
	</div>

	
<?php }?>
<?php if ($is_connected == false) {
header("Location: inscription.php");
exit;
}?>

<?php include('footer.php'); ?>