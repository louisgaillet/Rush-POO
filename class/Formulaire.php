<?php 
class Formulaire{

	private $data;
	public $surround = '';

	public function __construct($method, $action, $enctype){
		echo ("<form method='{$method}' action='{$action}' enctype='{$enctype}' class='form-control-file'>");

	}


	private function surround($html, $name, $id){
		return "<div class='form-group row'> <label class='col-md-4 col-xs-12' for='{$id}'>{$name}</label>{$html}</div> ";
	}

	public function inputHidden($name, $value){
		return '<input class="col-md-8 col-xs-12" type="hidden" name="' . $name .'" value="'.$value.'">';
	}

	public function input($name, $value, $id){
		return $this->surround( '<input type="text" class=" form-control col-md-8 col-xs-12" name="' . $name .'" value="'.$value.'" id="'.$id.'">', $name, $id);
	}

	public function inputNbr($name, $value, $id, $min){
		return $this->surround( '<input type="number" class=" form-control col-md-8 col-xs-12" min='.$min.' name="' . $name .'" value="'.$value.'">', $name, $id);
	}

	public function inputSelect($name, $valueI, $id, $list)
	{
		$select ='';
		$select .="<option selected  value='0'> Choose an option</option>";

		 foreach ($list as  $value) {
		 	$select .="<option value='{$value['id']}'>{$value['name']}</option>";
		 }
		return "
		<div class='form-group'> 
			<label for='{$id}'>{$valueI}</label>
			<select name='{$name}' id='{$id}' class='form-control' required>
			{$select}
			</select >
		</div> ";
	}

	public function inputFile($name, $value, $id)
	{
		return $this->surround( '<input type="file" class="form-control-file" name="' . $name .'" value="'.$value.'">', $name, $id);
	}

	public function textarea($name, $value,$id)
	{
		return $this->surround( '<textarea class="col-md-12 col-xs-12" row="3"  name="' . $name .'">'.$value."</textarea>", $name, $id);
	}

	public function submit($value,$id)
	{
		return ( '<div class="row form-group text-center"> <input type="submit" class="form-control-file btn btn-info" id="' . $id .'" value="'.$value.'"></div>');
	}

	public function close(){
		echo "</form>";
	}


}

 ?>