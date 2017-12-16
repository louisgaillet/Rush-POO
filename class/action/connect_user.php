<?php 
session_start();
require_once('../../class/Register.php');
require_once('../../bdd.php'); 
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['connected'])) {
	$connected =$_POST['connected'];
}
else{
	$connected = "off";
}
$verif = new User($bdd);
$verif->login($email, $password, $connected); 



if($verif->getStatus() == true){
$_SESSION['id'] = $verif->getId();
 header("Location: ../../index.php");
 exit;
}
else{
	header("Location: ../../login.php");
	$_SESSION['status'] = $verif->getError();
}

?>