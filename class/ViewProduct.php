<?php 
require_once('Atemplate.php');
	class ViewProduct extends Atemplate{

		public function getViewAdmin()
		{
			$list = '';
			foreach ($this->data as $value) 
			{
				$list .="
				<li class='item_product' data-id=".$value['id'].">
				<p>". $value['name']."</p>
					<div class=' d-flex flex-row justify-content-between align-items-center'>
						<div class='wrapper_buttons'>
							<button type='button' class='btn btn-default btn-sm btn btn-danger remove_product'>
          					<span class='glyphicon glyphicon-remove'></span> Remove 
        					</button>

        					<a href='?id=".$value['id']."' class='btn btn-default btn-sm edit btn-info edit'>
          						<span class='glyphicon  glyphicon-edit'></span> Edit 
        					</a>
        				</div>
        			</div>
				</li>";
			}
			echo "<ul class='products_list'>{$list}</ul>";
		}


		public function getViewUser()
		{
			$list = '';
			foreach ($this->data as $value) 
			{
				$image = str_replace("../../", "", $value['img']);
						$excerpt = $this->getExcerpt($value['descriptif'], 10);
						$list .="
						<a href='single_product.php?id=".$value['id']."' class='col-lg-3 col-md-4 col-sm-6 col-xs-12 item_product_user'>
						<div class='wrapper_product '>
							<div>
							<img src='{$image}' alt=''>
							</div>
							<div class='product_content flex-column'>
								<div class='product_header flex-column'>
									<h3>{$value['name']}</h3>
									<p class='description'>{$excerpt}</p>
								</div>
								<div class='product_bottom flex-column'>
									<p class='text-center price'>".$value['price']." $ </p>
								</div>
							</div>
						</div>
						</a>";
			}
			echo "<ul class='wrapper_item_product_user row'>{$list}</ul>";
		}

		public function viewSingleProduct()
		{
			$list = '';
			foreach ($this->data as $value) 
			{
				$image = str_replace("../../", "", $value['img']);
				$description = $value['descriptif'];
				$price = $value['price'];
				echo"
				<div class='container'>
					<div class='row'>
						<a href='./index.php' id='back'>Retour </a>
					</div>
						<div id='single_product' class='row'>
							<div class='col-md-6 col-xs-12'>
								<div id='product_image'>
									<img src='{$image}' alt='{$value['name']}'>
								</div>
							</div>
							<div class='col-md-6 col-xs-12'>
								<h2 class='text-center'>".$value['name']."</h2>
								<div class='description'>
									{$description}
								</div>
								<div id='price'>
									<p> Price : {$price} $ </p>
								</div>
							</div>
						</div>
				</div>
				";
			}
		}

	}

?>