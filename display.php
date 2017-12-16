<?php
include('header.php');
require('class/Disc.php');
require('bdd.php'); 

/*
INSERT INTO products (name, comm) VALUES (testdisc, blablabla);
*/
?>

<?php 
	$disc = new Disc($bdd);
?>

<div class="discs_display">
<div class="container">
<div class="row">
        <?php 
		$disc->showAllDiscs();
		 ?>
        	       
</div>
</div>
</div>

<?php
include('footer.php');
?>