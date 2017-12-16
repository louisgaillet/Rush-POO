<?php 
require('../Product.php');
require('../../bdd.php'); 
require('../ViewProduct.php'); 
$product = new Product($bdd);
$product->removeProduct($_POST['id']);

$data =  $product->showProduct();
$view = new ViewProduct($data);
$view->getViewAdmin();

 ?>