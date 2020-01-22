<?php

class ControllerApiHome extends Controller{
	
	public function getById(){
		
		if(empty($this->request->get['id']) OR !preg_match('/^[0-9]{10}$/', $this->request->get['id'])){
			echo 'false';
			return;
		}
		
		$this->model_def_home = $this->import->model('def/home');
		
		$items = $this->model_def_home->getTerByPid($this->request->get['id']);
		
		echo json_encode($items);
	}
	
	public function getPeople(){
		
		if(empty($this->request->get['email']) OR !filter_var($this->request->get['email'], FILTER_VALIDATE_EMAIL)){
			echo 'false';
			return;
		}
		
		$this->model_def_home = $this->import->model('def/home');
		
		echo json_encode($this->model_def_home->getPeople($this->request->get['email']));
	}
}