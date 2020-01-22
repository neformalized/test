<?php

class DB{
	
	public function __construct($host, $user, $pass, $base){
		
		$host = 'mysql:host='.$host.';dbname='.$base.';charset=utf8';
		
		try{
			$db = new PDO($host, $user, $pass);
		}
		catch(PDOException $error){
			die($error);
		}
		
		$this->db = $db;
		
		// Да конечно было бы круто снабдить класс собственными методами для работы с различными драйверами но это уж слишком для теста
	}
}