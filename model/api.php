<?php

class ModelApi extends Model{

	public function getRowsById($pid){
		
		$query = $this->db->prepare("SELECT `ter_id`,`ter_name` FROM `territories` WHERE `ter_pid` = ?");
		$query->execute(array($pid));
		
		$return = array();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)) $return[] = $row;
		
		return $return;
	}
	
	public function peopleByEmail($email){
		
		$query = $this->db->prepare("SELECT * FROM `people` WHERE `email` = ? LIMIT 1");
		$query->execute(array($email));
		
		return $query->fetch(PDO::FETCH_ASSOC);
	}
}