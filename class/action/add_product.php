<?php 
session_start();
require('../Product.php');
require('../../bdd.php'); 

$title = $_POST['title'];
$price = intval($_POST['price']);
$category = intval($_POST['category']);
$img = $_FILES['image'];
$descriptif=$_POST['descriptif'];

//var_dump($img);


$product = new Product($bdd);
$product->createProduct($title, $price, $category, $img, $descriptif);
$_SESSION['status'] = $product->getError();

header("Location: ../../gestion_product.php");
exit;

 ?>