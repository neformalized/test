<?php

class Request{

	public $post;
	public $get;
	public $request;

	public function __construct(){
		
		$this->post = $this->escape($_POST);
		$this->get = $this->escape($_GET);
		$this->request = $this->escape($_REQUEST);
	}

	public function escape($raw){
		
		if(!empty($raw)){
			if(is_array($raw)){
				foreach($raw AS $key=>$value){
					
					unset($raw[$key]);
					$raw[$this->escape($key)] = $this->escape($value);
				}
				
				return $raw;
			}
			else{
				
				return htmlspecialchars($raw, ENT_COMPAT, 'UTF-8');
			}
		}
	}
}