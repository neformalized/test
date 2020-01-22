<?php

class Controller{
	
	protected $view;
	
	public function __construct($bundle){
		
		foreach($bundle AS $key=>$value) $this->$key = $value;
		
		$this->view = new View();
	}
}