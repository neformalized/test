<?php

class View{
	
	public $title;
	public $styles;
	public $scripts;
	
	public function rend($layer, $path, $data = null){
		
		if(!empty($data)) extract($data);
		
		$title = $this->title;
		$styles = $this->styles;
		$scripts = $this->scripts;
		
		require_once(DIR_VIEW.$layer.'.tpl');
	}
	
	public function addStyle($href, $rel = 'stylesheet'){
		$this->styles[] = array('href' => $href, 'rel' => $rel);
	}
	
	public function addScript($src, $type = 'text/javascript'){
		$this->scripts[] = array('src' => $src, 'type' => $type);
	}
}