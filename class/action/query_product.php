<?php 

session_start();
require_once('../Product.php');
require_once('../../bdd.php'); 
require('../ViewProduct.php');

$post = array(); 
parse_str($_POST['data'], $post);
$product = new Product($bdd);
$data =$product->query($post['price_minimum'], $post['price_maximum'], $post['category']);
$view = new ViewProduct($data);
$view->getViewUser();

?>