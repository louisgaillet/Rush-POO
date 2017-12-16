<?php
//include('header.php');
require('class/Search.php');
require('class/Form.php');
require('class/Categories.php');
require('bdd.php');

?>

<?php 
	//$manage = new Manage($bdd);
	$categories = new Categories($bdd);
	$categories->setCategories();
	$categories->getCategories();
	$categories=$categories->categories;
?>

<?php
	$form = new Form($_POST);
?>
<form action="" method="post">
<!-- Mettre du css +  <div> label + input </div> -->
	Search:
<?php
	echo $form->input('find');
?>
	Min price:
<?php
	echo $form->inputnbr('min');
?>
	Min price:
<?php
	echo $form->inputnbr('max');
?>
<span>
<?php
	echo $form->inputSelect('cat','Category :','cat',$categories);
?>
</span>
<?php
	echo $form->submitSearch();
?>
<div class="discs_display">
<div class="container">
<div class="row">
<?php 
	if(isset($_POST['submit'])){
			isset($_POST['find']) ? $find = $_POST['find'] : $find = NULL;
			isset($_POST['min']) ? $min = $_POST['min'] : $min = NULL;
			isset($_POST['max']) ? $max = $_POST['max'] : $max = NULL;
			isset($_POST['cat']) ? $cat = $_POST['cat'] : $cat = 0;
			$verif = new Search($bdd);
			$verif->searchDatabase($find, $min, $max, $cat);
		}
?>
</div>
</div>
</div>

<?php
	include('footer.php');
?> 

