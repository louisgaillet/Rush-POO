<?php 
$categories = new Categories($bdd);
$categories->setCategories();
$categories->getCategories();
$categories=$categories->categories;

// Si c'est une modificationn
	if (isset($_GET['id'])) {
		$action="class/action/update_product.php";
		$product = new Product($bdd);
		$product->setData($_GET['id']);
		$data = $product->getData();
		
		$form = new Formulaire('post',$action,'multipart/form-data');
		echo $form->inputHidden('id',$_GET['id']);
		echo $form->input('title',$data['name'],'title_product');
		echo $form->inputNbr('price',$data['price'],'price_product',0); 
		echo $form->inputSelect('category','Choose category','category_product',$categories);
		echo $form->inputFile('image','Picture (Max : 1MB, Format: JPG, JPEG, PNG, GIF)','picture_product'); 
		echo $form->textarea('descriptif',$data['descriptif'],'descriptif');
		echo $form->submit('Save', "add_product");
		$form->close();
	}

// Si c'est une création
	else{
		$action="class/action/add_product.php";
		$form = new Formulaire('post',$action,'multipart/form-data');
		echo $form->input('title','','title_product');
		echo $form->inputNbr('price','','price_product',0); 
		echo $form->inputSelect('category','Choose category','category_product',$categories);
		echo $form->inputFile('image','Picture (Max : 1MB, Format: JPG, JPEG, PNG, GIF)','picture_product'); 
		echo $form->textarea('descriptif','Descriptif','descriptif');
		echo $form->submit('Save', "add_product");
		$form->close();
		
	}
?>