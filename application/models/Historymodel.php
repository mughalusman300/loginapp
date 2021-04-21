<?php

class Historymodel extends CI_Model {
    	
	
	public function Get_Clients_Ticketing_By_Client_id($id){
	$query ="SELECT * FROM `ticket`INNER JOIN `client` on `client`.`client_id`= `ticket`.`client_id`  WHERE `ticket`.`client_id`=?";
	$res =  $this->db->query($query,array($id));
	return $res->result();
	}
	public function Check_Client_Exist_In_Ticket($cid){
		$a="";
		$query="SELECT * FROM ticket WHERE `client_id`=?";
		$res = $this->db->query($query,array($cid));
		$count=$res->num_rows();
		if($count>=1){
			$a="done";
		}
		else {
			$a="undone";
		}
		return $a;
	}
		public function Check_Client_Exist_In_Payment($cid){
		$a="";
		$query="SELECT * FROM payment WHERE `client_id`=?";
		$res = $this->db->query($query,array($cid));
		$count=$res->num_rows();
		if($count>=1){
			$a="done";
		}
		else {
			$a="undone";
		}
		return $a;
	}
		public function Check_Client_Exist_In_Client($cid){
		$a="";
		$query="SELECT * FROM client WHERE `client_id`=?";
		$res = $this->db->query($query,array($cid));
		$count=$res->num_rows();
		if($count>=1){
			$a="done";
		}
		else {
			$a="undone";
		}
		return $a;
	}
		
	public function Get_Payment_By_Client_id($id){
	$query ="SELECT *
            	FROM (((`payment`
				INNER JOIN `client` on `client`.`client_id`= `payment`.`client_id`)
	            INNER JOIN `package` on `package`.`package_id`= `payment`.`package_id`)
                INNER JOIN `users` on `users`.`user_id`= `payment`.`user_id`)
				WHERE `payment`.`client_id`=?";
	$res =  $this->db->query($query,array($id));
	return $res->result();
	}
	public function Get_Client_By_Id($id){
	$GC_query ="SELECT * FROM `client` INNER JOIN `package` on `package`.`package_id`= `client`.`package_id` WHERE `client_id`=?";
	$res =  $this->db->query($GC_query,array($id));
	return $res->result();
	}
}
