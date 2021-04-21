<?php

class Packagemodel extends CI_Model {
    	
	
	public function Get_Packages(){
	$GP_query ="SELECT * FROM `package`";
	$res =  $this->db->query($GP_query);
	return $res->result();
	}
	
	
}
