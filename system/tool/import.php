<?php

class Import{
	
	public function __construct($bundle){
		
		$this->bundle = $bundle;
	}
	
	public function model($model){
		
		if(!$this->valid(DIR_MODEL, $model)) return;
		require_once(DIR_MODEL.$model.'.php');
		
		if($tmp = explode('/', $model)) $class = 'Model'.implode(array_map(function($x){return ucfirst($x);}, $tmp));
		else $class = 'Model'.ucfirst($model);
		
		return new $class($this->bundle);
	}
	
	public function lang($lang){
		
		if(!$this->valid(DIR_LANG, $lang)) return;
		require_once(DIR_LANG.$lang.'.php');
		
		return $_;
	}
	
	private function valid($dir, $path){
		
		if(!preg_match('/^[a-z]{2,32}([\/][a-z]{2,32})?$/i', $path)) return false;
		if(!file_exists($dir.$path.'.php')) return false;
		
		return $dir.$path.'.php';
	}
}