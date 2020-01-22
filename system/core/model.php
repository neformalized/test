<?php

class Model{
	
	public function __construct($bundle){
		
		foreach($bundle AS $key=>$value) $this->$key = $value;
	}
}