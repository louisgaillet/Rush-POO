<?php 

require('../Manage.php');
require('../../bdd.php'); 
require('../ViewManage.php');
$manage = new Manage($bdd);
$manage->remove($_POST['id']);
$data = $manage->showAllUsers();
$view = new ViewManage($data);
$view->GetAllUsers();

?>