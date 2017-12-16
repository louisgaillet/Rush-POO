<?php 
session_start();
require('../Product.php');
require('../../bdd.php'); 

$title = $_POST['title'];
$id = $_POST['id'];
$price = intval($_POST['price']);
$category = intval($_POST['category']);
$img = $_FILES['image'];
$descriptif=$_POST['descriptif'];


$product = new Product($bdd);
$product->updateProduct($id,$title,  $descriptif, $price, $category ,$img);
$_SESSION['status'] = '';
 $_SESSION['status'] = $product->getError();


 if($product->getStatus() == true){

 	header("Location: ../../gestion_product.php");
 }else{
 	header("Location: ../../gestion_product.php?id=".$id);
 }
 exit;
//echo $product->setImageFromdb(29);

 ?>