<?php

class Route{

	protected $bundle;

	public function __construct($bundle){
		
		$this->bundle = $bundle;
	}
	
	public function work(){
		
		$defaultController = 'def/home'; // Дефолтное можно подгружать откуда то, из конфиг файла или базки
		$defaultAct = 'index'; // 
		
		// Проверяем наличие параметров в урл
		
		$controller = !empty($this->bundle->request->request['controller']) ? $this->bundle->request->request['controller'] : $defaultController;
		$act = !empty($this->bundle->request->request['act']) ? $this->bundle->request->request['act'] : $defaultAct;

		// Проверяем на уязвимость
		
		$controller = preg_match('/^[a-z]{2,32}([\/][a-z]{2,32})?$/i', $controller) ? $controller : $defaultController;
		$act = preg_match('/^[a-z]{2,32}$/i', $act) ? $act : $defaultAct;
		
		// Проверяем существование и если нет то загружаем дефолтное
		
		if(file_exists(DIR_CONTROLLER.$controller.'.php')) $this->execute($controller, $act);
		else $this->execute($defaultController, $defaultAct);
	}
	
	private function execute($controller, $act){
		
		require_once(DIR_CONTROLLER.$controller.'.php');
		
		$class = $this->getClassName($controller);
		$object = new $class($this->bundle);
		
		if(method_exists($object, $act)) $object->$act();
		else $object->index();
	}
	
	private function getClassName($path){
		
		if($tmp = explode('/', $path)) return 'Controller'.implode(array_map(function($x){return ucfirst($x);}, $tmp));
		else return 'Controller'.ucfirst($path);
		
		// Интересный факт, имя класса можно получить и так 'controller'.str_replace('/', null, $path) и это будет работать несмотря на неидентичность, честно, не знаю какой метод лучше
	}
}