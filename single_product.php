<?php 
include('header.php');
require_once('class/Product.php');
require_once('class/ViewProduct.php');
require_once('bdd.php');

$product = new Product($bdd); 

?>
<?php 
if (isset($_GET['id'])){
	$id = intval($_GET['id']);
	$data = $product->getProduct($id);
	$view = new ViewProduct($data);
	$view->viewSingleProduct();

?>

<div class="container" id="wrapper_product">
	
</div>
<?php 
}else{
	header("Location: ../../index.php");
}
include('footer.php'); 
?>