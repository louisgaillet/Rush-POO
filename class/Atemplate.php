<?php 

abstract class  Atemplate 
{

	public function __construct($data)
	{
		$this->setData($data);
	}

	public function setData($data)
	{
		if ($data == NULL || $data == "" || !is_array($data)) {
			echo "Bad data";
			exit;
		}
		$this->data = $data;
	}

	public function getExcerpt($excerpt, $size)
		{

			if (is_integer($size) && is_string($excerpt)) {
				$excerpt = substr($excerpt, 0,150);
				$excerpt .= ' ...' ;
				return $excerpt;
			}
		}


}
?>
