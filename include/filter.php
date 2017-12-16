<?php 

$categories = new Categories($bdd);
$categories->setCategories();
$categories->getCategories();
$categories=$categories->categories;

$action="class/action/query_product.php";
$form = new Formulaire('post',$action,'multipart/form-data');

echo $form->inputNbr('price_minimum','0','price_product',0);
echo $form->inputNbr('price_maximum','99','price_product',0);
echo $form->inputSelect('category','Choose category','category_product',$categories);
echo $form->submit('Filter', "lauch_query");
$form->close();