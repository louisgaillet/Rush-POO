<?php 
session_start(); 
include('bdd.php'); 
 require_once('class/Register.php');
$is_admin = false;
$is_connected = false;
$navChild ='';


if (isset($_SESSION['id']) ){
	$is_connected = true;
	$user=new User($bdd);
	$user->setPower($_SESSION['id']);
	if( $user->getPower() == 1){
		$is_admin = true;
		$_SESSION['admin'] = 1;
	}
}
if ($is_connected == true){
$navChild = "
	<li class='nav-item'>
		<a href='logout.php' class='nav-link' >Logout</a>
	</li>
";
}
?>
<?php if ($is_admin == true) {
$navChild .= "
	<li class='admin nav-item'>
		<a href='administration.php' class='nav-link' >Administration</a>
	</li>
	<li class='admin nav-item'>
		<a href='gestion_product.php' class='nav-link' >Product manager</a>
	</li>
	<li class='admin nav-item'>
		<a href='gestion_categories.php' class='nav-link' >Gestion categories</a>
	</li>
";					
}

else{
 $navChild .= "
	<li class='admin nav-item'>
		<a href='login.php' class='nav-link' >Login</a>
	</li>
	<li class='admin nav-item'>
		<a href='inscription.php' class='nav-link' >Register</a>
	</li>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Melomane</title>
	<link rel="stylesheet" href="assets/css/product.css">
	<link rel="stylesheet" href="assets/css/admin.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Istok+Web|Lora" rel="stylesheet">
</head>
<body>

	<header>
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse bg-faded fixed-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="index.php">Melomane</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php 
						if( isset($navChild))
							echo $navChild;
					?>
				</ul>
			</div>
		</nav>
		
	</header>
	<div class="wrapper_site">



<!-- Si l'on a des erreurs -->
	<?php if (isset($_SESSION['status'])) {
		echo "<div class='errors'> ".$_SESSION['status']."</div>";
		unset($_SESSION['status']);
	} ?>

<!-- 	<?php if (isset($_COOKIE['name'])) {
		$_SESSION['login']= $_COOKIE['name'];
	} ?> -->
	