<?php 
session_start();
require_once('../../class/Register.php');
require_once('../../bdd.php'); 

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify =$_POST['password_verify'];
$registration = new User( $bdd);
$registration->createUser($name, $email, $password, $password_verify, 0);


if($registration->getStatus() == 1){
$_SESSION['status'] = $registration->getError();
  header("Location: ../../login.php");
  exit;
}
else{
	header("Location: ../../inscription.php");
	$_SESSION['status'] = $registration->getError();
}

?>