<?php 
session_start();
require_once('../Categories.php');
require_once('../../bdd.php'); 


if (!isset( $_POST['choose_category'])) {
	$id = 0;
}
else{
	$id = $_POST['choose_category'];
}

$id =intval($id);

$categorie = new Categories($bdd);
$categorie->removeCategorie($id);

$_SESSION['status'] = $categorie->getError();

header("Location: ../../gestion_categories.php");
exit;


 ?>