<?php 
session_start();
require_once('../Categories.php');
require_once('../../bdd.php'); 


$newName= $_POST['name'];

if (!isset( $_POST['parent_category'])) {
	$parentCategorie = 0;
}
else{
	$parentCategorie = $_POST['parent_category'];
}

if (!isset( $_POST['choose_category'])) {
	$id = 0;
}
else{
	$id = $_POST['choose_category'];
}

$id =intval($id);
$parentCategorie =intval($parentCategorie);

// echo $id;
// echo $newName;
// echo $parentCategorie;

$categorie = new Categories($bdd);
$categorie->updateCategorie($id,$newName,$parentCategorie);

$_SESSION['status'] = $categorie->getError();

header("Location: ../../gestion_categories.php");
exit;


 ?>