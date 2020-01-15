<?php

class ModelUltraForm extends Model{

	public function getStates(){
		
		$query = $this->db->prepare("SELECT `ter_name`,`ter_id` FROM `territories` WHERE `ter_level` = 1");
		$query->execute();
		
		$return = array();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)) $return[] = $row;
		
		return $return;
	}
	
	public function addPeople($fio, $email, $territory){
		
		$query = $this->db->prepare("INSERT INTO `people`(`name`,`email`,`territory`) VALUES(?,?,?)");
		$query->execute(array($fio, $email, $territory));
	}
}