<?php 

class Categories {

	protected $status = true;
	public $error = "<div class='alert alert-success' role='alert'>";

	public function __construct($bdd)
	{
		$this->bdd = $bdd;
	}

	// _____________SETTER _______________//

		public function setCategories()
		{
			$sth=$this->bdd->prepare("SELECT * FROM categories "); 
			$sth->execute();
			$result = $sth->fetchall();
			$this->categories = $result;	
		}

		public function setName($name)
		{
			if ( strlen($name) < 3 || strlen($name) > 20)
			{
				$this->error.= "<p> Invalid name (between 3 and 10 caracters)</p>";
				$this->status = false;
			}
			$this->name =$name;
		}

		


	//_____________GETTER__________________//
		public function getCategories()
		{
			return $this->categories;
			
		}

		public function getError()
		{
			return $this->error;
		}

	// _____________METHODS_________________//
		public function showAllCategories()
		{

		}

		public function addCategorie($name, $parent)
		{

			$this->setName($name);
			if ($parent == O)
				$parent =NULL;
			if($this->status == true)
			{
				
				$sth=$this->bdd->prepare("INSERT INTO categories (name, parent_id) VALUES(?, ?)"); 
				$sth->execute(array($this->name,$parent));
				$count = $sth->rowCount();
				if ($count > 0) 
				{
					$this->error .= '<p> Created</p>';
				}
					else{
						$this->error .= '<p> Fail  </p>';
					}
			}
		}

		public function updateCategorie($id,$newName,$parentCategorie)
		{

			$this->setName($newName);

			if ($parentCategorie == O)
				$parentCategorie =NULL;
			if($id == 0)
			{
				$this->error .= '<p> Please choose one category </p>';
				$this->status = false; 
			}

				
			if($this->status == true)
			{
				$sth=$this->bdd->prepare("UPDATE categories SET name = ?, parent_id = ? WHERE id = ? ");  
					$sth->execute(array($this->name,$parentCategorie,$id));
					$count = $sth->rowCount();
					if ($count > 0) 
					{
						$this->error .= '<p> Updated sucess</p>';
					}
					else{
						$this->error .= '<p> Updated fail</p>';
					}
			}
		}

		public function removeCategorie($id)
		{
				if($id == 0)
			{
				$this->error .= '<p> Please choose one category </p>';
				$this->status = false; 
			}

			if($this->status == true)
			{
				$sth=$this->bdd->prepare("DELETE FROM categories  WHERE id = ? ");  
					$sth->execute(array($id));
					$count = $sth->rowCount();
					if ($count > 0) 
					{
						$this->error .= '<p> Deleted sucess</p>';
					}
					else{
						$this->error .= '<p> Deleted fail</p>';
					}
			}

		}

		public function __destruct()
		{
			$this->error .= "</div>";
		}
}
?>