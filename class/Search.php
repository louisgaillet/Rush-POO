<?php
	class Search{

		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}

		public function getMaxPrice()
		{
			$sth=$this->bdd->prepare("SELECT MAX(price) AS maxprice FROM products"); 
			$sth->execute();
			$result = $sth->fetch();
			return $result['maxprice'];
		}

		public function getMinPrice()
		{
			$sth=$this->bdd->prepare("SELECT MIN(price) AS minprice FROM products"); 
			$sth->execute();
			$result = $sth->fetch();
			return $result['minprice'];
		}

		public function searchDatabase($find, $min, $max, $cat)
		{
			if ($min == NULL)
				$min=$this->getMinPrice();
			if ($max == NULL)
				$max=$this->getMaxPrice();
			if ($find == NULL && $cat)
				$sth=$this->bdd->prepare('SELECT * FROM products WHERE category_id='.$cat.' AND price BETWEEN '.$min.' AND '.$max.' AND name LIKE "%'.$find.'%"');
			if ($cat == 0)
			{
				if ($find == NULL)
					$sth=$this->bdd->prepare('SELECT * FROM products');
				else
				$sth=$this->bdd->prepare('SELECT * FROM products WHERE price BETWEEN '.$min.' AND '.$max.' AND name LIKE "%'.$find.'%"');
			}
			else
				$sth=$this->bdd->prepare('SELECT * FROM products WHERE category_id='.$cat.' AND price BETWEEN '.$min.' AND '.$max.' AND name LIKE "%'.$find.'%"');
			$sth->execute();
			$count = $sth->rowCount();
			if ($count == 0)
        		{
        			echo "Sorry, no result found, please try again...";
        		}
			while ($result = $sth->fetch())
				{
?>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
<?php
        				echo '<div class="card" style="width: 20rem;"><img class="card-img-top" src='.$result['img'] .' alt="Card image cap"><div class="card-block"><h4 class="card-title">'. $result['name'] . '</h4><p class="card-text">' . $result['descriptif'] . '</p></div><div class="card-block"><span class="card-text">'. $result['price'] . ' €</span><div style="text-align: right"><a href="#" class="card-link">Buy</a></div></div></div>';
?>

        			</div>
<?php
					
				}
		}
	
}
?>
