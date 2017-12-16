<?php
session_start ();

session_unset ();

session_destroy ();

if ( isset($_COOKIE['name']) ) {
		setcookie ('name', '', time() - 3600, '/', 'localhost');
}


if ( isset($_COOKIE['admin']) ) {
		setcookie ('admin', '', time() - 3600, '/', 'localhost');
}

header ('location:login.php');
?>