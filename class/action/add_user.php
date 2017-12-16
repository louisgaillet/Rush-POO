<?php 
require('../../header.php');
require('../Manage.php');
require('../../bdd.php'); 

$manage = new Manage($bdd);

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify =$_POST['password_verify'];
$is_futur_admin =$_POST['is_admin'];
if($is_futur_admin == "on")
{
	$is_futur_admin = 1;
}
else{
	$is_futur_admin = 0;
}

$user = new User( $bdd);
$user->createUser($name, $email, $password, $password_verify, $is_futur_admin);

$_SESSION['status'] = $user->getError();
if ($is_admin == true) 
{
	header("Location: ../../administration.php");
}
else{
	header("Location: ../../login.php");
}
 ?>
