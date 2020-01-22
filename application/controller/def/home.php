<?php

class ControllerDefHome extends Controller{
	
	public function index(){
		
		$this->model_def_home = $this->import->model('def/home');
		$this->text_def_home = $this->import->lang('def/home');
		
		//
		
		$this->data['inputName'] = $this->text_def_home['inputName'];
		$this->data['inputEmail'] = $this->text_def_home['inputEmail'];
		$this->data['selectState'] = $this->text_def_home['selectState'];
		$this->data['selectRegion'] = $this->text_def_home['selectRegion'];
		$this->data['selectTerritory'] = $this->text_def_home['selectTerritory'];
		$this->data['buttonSubmit'] = $this->text_def_home['buttonSubmit'];
		
		//
		
		$this->data['states'] = $this->model_def_home->getStates();
		
		//
		
		$this->view->addScript('js/zform.js');
		$this->view->addScript('js/chosen.jquery.min.js');
		
		$this->view->addStyle('style/chosen.min.css');
		
		$this->view->title = $this->text_def_home['title'];
		
		//
		
		$this->view->rend('layer/def', 'def/home', $this->data);
	}
	
	public function done(){
		
		$name = $this->request->post['name'];
		$email = $this->request->post['email'];
		$territory = !empty($this->request->post['territory']) ? $this->request->post['territory'] : $this->request->post['region'];
		
		$error = false;
		
		if(!preg_match('/^[a-zа-я]{2,12}([\ ][a-zа-я]{2,12})?([\ ][a-zа-я]{2,12})?$/i', $name)) $error = true;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $error = true;
		if(!preg_match('/^[0-9]{10}$/', $territory)) $error = true;
		
		if($error == true){
			
			$this->index();
			return;
		}
		
		$this->model_def_home = $this->import->model('def/home');
		$this->model_def_home->addPeople($name, $email, $territory);
		
		$this->view->rend('layer/def', 'def/homesuccess');
	}
}