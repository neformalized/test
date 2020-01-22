<?php

class Bundle{
	
	public function append($name, $bundle){
		
		$this->$name = $bundle;
	}
}