<?php 
class Form{

	private $data;
	public $surround = 'span';

	public function __construct($data=array()){
		$this->data=$data;

	}

	private function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}> ";
	}

	private function getValue($index){
		return isset ($this->data[$index]) ? $this->data[$index] : null;
	}

	public function input($name){
		return $this->surround( '<input type="text" name="' . $name .'" value="'.$this->getValue($name).'">');
	}

	public function inputnbr($number){
		return $this->surround( '<input type="number" name="' . $number .'" value="'.$this->getValue($number).'">');
	}

	public function inputpwd($password){
		return $this->surround( '<input type="password" name="' . $password .'" value="'.$this->getValue($password).'">');
	}

	public function checkbox($check){
		return $this->surround('<input type="checkbox" name="' . $check . '">');
	}

	public function submit(){
		return $this->surround('<button type="submit" class="btn btn-info" name="submit">Register</button>');
	}
	public function submitSearch(){
		return $this->surround('<button type="submit" name="submit">Search</button>');
	}

	public function inputSelect($name, $valueI, $id, $list)
	{
		$select ='';
		$select .="<option selected disabled value='0'> Choose an option</option>";

		 foreach ($list as  $value) {
		 	$select .="<option value='{$value['id']}'>{$value['name']}</option>";
		 }
		return "
		<div class='form-group'> 
			<label for='{$id}'>{$valueI}</label>
			<select name='{$name}' id='{$id}' class='form-control'>
			{$select}
			</select >
		</div> ";
		;
	}
}

 ?>