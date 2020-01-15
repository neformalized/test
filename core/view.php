<?php

class View{

	public function viewer($layer, $path, $data = NULL){
		
		if(!empty($data)) extract($data);
		
		include('view/'.$layer);
	}
}