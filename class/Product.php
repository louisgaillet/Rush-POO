<?php

	class Product
	{
		protected $status = true;
		public $error = "<div class='alert alert-success' role='alert'>";
		public $data;
		public $resultQuery;


		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}

		// ________________ SETTER _______________

		protected function setTitle($title)
		{
			if ( strlen($title) < 3 || strlen($title) > 100)
			{
				$this->error .= "<p> Invalid title</p>";
				$this->status = false;
			}

			$this->title=$title;
		}

		protected function setPrice($price)
		{
			if ( !is_integer($price))
			{
				$this->error .= "<p> Invalid price</p>";
				$this->status = false;
			}
			$this->price=$price;
		}

		protected function setCategory($category)
		{		
			if ( !is_int($category))
			{
				$this->error .= "<p> Invalid category</p>";
				$this->status = false;
			}
				$this->category=$category;
		}

		protected function setImg($img)
		{
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($img['name'], '.')  ,1)  );

			if ($img['error'] > 0) 
			{
				$this->error .= "<p>Erreur lors du transfert</p>";
				$this->status = false;
			}

			if ($img['size'] > 1048576)
			{
				$this->error .= "<p>Le fichier est trop gros</p>";
				$this->status = false;
			} 

			if ($img['size'] == 0)
			{
				$this->error .= "<p>Problem with picture</p>";
				$this->status = false;
			} 

			
			if ( !(in_array($extension_upload,$extensions_valides)) ){
				$this->error .= "<p>Bad extension</p>";
				$this->status = false;
			} 
				$this->img=$img;

		}

		protected function setDescriptif($descriptif)
		{	
				$this->descriptif=$descriptif;	
		} 

		public function setData($id)
		{
			$sth=$this->bdd->prepare("SELECT * FROM products WHERE id = ? "); 
			$sth->execute(array($id));
			$result = $sth->fetch();
			$this->data = $result;
		}

		public function setImageFromdb($id)
		{
			$sth=$this->bdd->prepare("SELECT img FROM products WHERE id = ? ");
			$sth->execute(array($id));
			$result = $sth->fetch();
			$this->urlImg = $result['img']; 	
		}

		//________________ GETTER ___________________//
		public function getError()
		{
			return $this->error;
		}

		public function getData()
		{
			return($this->data);
		}

		public function getStatus()
		{
			return $this->status;
		}

		public function getUrlImg()
		{
			return $this->urlImg;
		}

		public function getProduct($idPost)
		{
			$sth=$this->bdd->prepare("SELECT * FROM products WHERE id = ?"); 
			
			$sth->execute(array($idPost));
			$result = $sth->fetchAll();

			return $result;
		}

		// Methods
		public function createProduct($title, $price, $category, $img, $descriptif)
		{
			$this->setTitle($title);
			$this->setPrice($price);
			$this->setCategory($category);
			$this->setImg($img);
			$this->setDescriptif($descriptif);
			$this->pushInDB($this->title, $this->descriptif, $this->price, $this->category);
		}

		protected function mooveImage()
		{

			$urlImg = "../../assets/img/";
			$urlImg .=$this->img['name'];
			$resultat = move_uploaded_file($this->img['tmp_name'],$urlImg);
			$this->urlImg = $urlImg;
		}

		protected function pushInDB($title, $descriptif, $price, $category)
		{
			if ($this->status == true) {
				$this->mooveImage();
				$sth=$this->bdd->prepare("INSERT INTO products (name, price, category_id , img, descriptif) VALUES(?, ?, ?, ?, ?)"); 
				$sth->execute(array($title, $price, $category, $this->urlImg, $descriptif));
				$this->error .="<p>Sucess</p>";

			}
		} 

		public function showProduct()
		{
			$list = '';
			$sth=$this->bdd->prepare("SELECT * FROM products"); 
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}

		public function removeProduct($id)
		{
			$sth=$this->bdd->prepare("DELETE FROM products WHERE id = ? "); 
			$sth->execute(array($id));
			$count = $sth->rowCount();
				if ($count > 0) {
					$this->error .= "<p> Success</p>";
				}
		}

		public function updateProduct($id, $title, $descriptif, $price, $category_id, $img )
		{
			$this->setTitle($title);
			$this->setPrice($price);
			$this->setCategory($category_id);
			if($img['size'] == 0){
				$this->setImageFromdb($id);
			}
			else{
				$this->setImg($img);
				$this->mooveImage();
			}
			$this->setDescriptif($descriptif);
			$this->id = $id;

			if ($this->status == true) {
				
				 $sth=$this->bdd->prepare("UPDATE products SET name = ?, price = ?, category_id = ?, img = ?, descriptif = ? WHERE id = ? "); 
				 $sth->execute(array($title, $price, $category_id, $this->urlImg, $descriptif, $id));
				  $count = $sth->rowCount();
				 
			}
			
		}

		public function query($prixMin, $prixMax, $categorieID)
		{ 
			if ($categorieID == 0)
			{
				$sth=$this->bdd->prepare("SELECT * FROM products WHERE price BETWEEN ? AND ? ");
				$sth->execute(array($prixMin,$prixMax ));
			}
			else
			{
				$sth=$this->bdd->prepare("SELECT * FROM products WHERE price BETWEEN ? AND ? AND category_id = ? ");
				$sth->execute(array($prixMin,$prixMax,$categorieID ));
			}

			$result = $sth->fetchall();
			return  $result;
		}

		public function search($search)
		{
			$sth=$this->bdd->prepare("SELECT * FROM products WHERE name LIKE :search");	
			$sth->execute(array(':search' => '%'. $search . '%'));
			$result = $sth->fetchall();
			return  $result;
			
		}

		public function __destruct()
		{
			$this->error .= "</div>";
		}
	} 
?>