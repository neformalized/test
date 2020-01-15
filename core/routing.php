<?php

class Routing{

	static function run(){
		
		//
		
		$defaultControllerName = 'UltraForm';
		$defaultFncName = 'index';
		
		$controllerName = 'UltraForm';
		$fncName = 'index';
		
		//
		
		if(!empty($_REQUEST['controller']) AND preg_match('/^([a-z]{3,12})$/i', $_REQUEST['controller'])) $controllerName = $_REQUEST['controller'];
		if(!empty($_REQUEST['fnc']) AND preg_match('/^([a-z]{3,12})$/i', $_REQUEST['fnc'])) $fncName = $_REQUEST['fnc'];
		
		//
		
		if(file_exists('controller/'.strtolower($controllerName).'.php')){
			
			include('controller/'.strtolower($controllerName).'.php');
			
			if(file_exists('model/'.strtolower($controllerName).'.php')){
				
				include('model/'.strtolower($controllerName).'.php');
			}
		}
		else{
			
			$controllerName = $defaultControllerName;
			$fncName = $defaultFncName;
			
			include('controller/'.strtolower($controllerName).'.php');
			include('model/'.strtolower($controllerName).'.php');
		}
		
		//
		
		$className = 'Controller'.$controllerName;
		
		//
		
		$controller = new $className;
		
		if(method_exists($controller, $fncName)) $controller->$fncName();
		else $controller->index();
		
		//
	}
}