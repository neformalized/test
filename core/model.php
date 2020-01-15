<?php

class Model{
	
	public $db;
	
	public function __construct(){
		
		require_once('db.php');
		
		$this->db = new PDO('mysql:host='.$host.';dbname='.$base, $user, $pass);
	}
	
	public function getData(){
	
	}
}