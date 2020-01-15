<?php

class ControllerApi extends Controller{
	
	public function getLocality(){
		
		if(!preg_match('/^([0-9]{10})$/', $_REQUEST['ter_id'])){
			
			echo "false";
			return;
		}
		
		$this->model = new ModelApi();
		
		$ter_id = $_REQUEST['ter_id'];
		$locals = $this->model->getRowsById($ter_id);
		
		echo json_encode($locals);
	}
	
	public function checkEmail(){
		
		if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
			
			echo "false";
			return;
		}
		
		$this->model = new ModelApi();
		
		$email = $_REQUEST['email'];
		
		echo json_encode($this->model->peopleByEmail($email));
	}
}