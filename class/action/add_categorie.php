<?php 
session_start();
require_once('../Categories.php');
require_once('../../bdd.php'); 

$name= $_POST['name'];
if (!isset( $_POST['parent_category'])) {
	$parentCategorie = 0;
}
else{
	$parentCategorie = $_POST['parent_category'];
}

$categorie = new Categories($bdd);
$categorie->addCategorie($name,$parentCategorie);

$_SESSION['status'] = $categorie->getError();

header("Location: ../../gestion_categories.php");
exit;


 ?>