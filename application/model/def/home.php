<?php

class ModelDefHome extends Model{

	public function getStates(){
		
		$query = $this->db->prepare('SELECT `ter_name`,`ter_id` FROM `territories` WHERE `ter_level` = 1');
		$query->execute();
		
		//
		
		$return = array();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)) $return[] = $row;
		
		return $return;
	}
	
	public function getTerByPid($pid){
		
		$query = $this->db->prepare("SELECT `ter_id`,`ter_name` FROM `territories` WHERE `ter_pid` = ?");
		$query->execute(array($pid));
		
		$return = array();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)) $return[] = $row;
		
		return $return;
	}
	
	public function getPeople($email){
		
		$query = $this->db->prepare("SELECT * FROM `people` WHERE `email` = ? LIMIT 1");
		$query->execute(array($email));
		
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	public function addPeople($name, $email, $territory){
		
		$query = $this->db->prepare("INSERT INTO `people`(`name`,`email`,`territory`) VALUES(?,?,?)");
		$query->execute(array($name, $email, $territory));
	}
}