<?php

class ControllerUltraForm extends Controller{

	public function index(){
		
		$this->model = new ModelUltraForm();
		
		if($_POST) $this->reg();
		else $this->form();
	}
	
	public function form(){
		
		$states = $this->model->getStates();
		
		$data['states'] = $states;
		
		$this->view->viewer('layers/def.tpl', 'ultraform.tpl', $data);
	}
	
	public function reg(){
		
		$fio = $_POST['fio'];
		$email = $_POST['email'];
		$territory = $_POST['territory'];
		
		$error = false;
		
		if(!preg_match('/^[a-zа-я]{2,12}([\ ][a-zа-я]{2,12})?([\ ][a-zа-я]{2,12})?$/i', $fio)) $error = true;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $error = true;
		if(!preg_match('/^[0-9]{10}$/', $territory)) $error = true;
		
		//
		
		if($error == true){
			
			$this->form();
			return;
		}
		
		//
		
		$this->model->addPeople($fio, $email, $territory);
		$this->view->viewer('layers/def.tpl', 'ultrasuccess.tpl');
	}
}