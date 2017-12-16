<?php 

require('../Manage.php');
require('../../bdd.php'); 
require('../ViewManage.php');
$manage = new Manage($bdd);
$manage->updateProfil($_POST['id'],$_POST['username'] ,$_POST['email'] ,$_POST['password'] , $_POST['password_confirmation']);
$data = $manage->showAllUsers();
$view = new ViewManage($data);
$view->GetAllUsers();

 ?>